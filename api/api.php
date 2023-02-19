<?php
session_start();

$dashboard = 'https://127.0.0.1:8080/dashboard';
$register = 'http://127.0.0.1:8080/register';
$img_folder = 'http://127.0.0.1/immo/src/assets/img/';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header(
    'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept'
);

function getConnexion()
{
    return new PDO(
        'mysql:host=localhost; dbname=immobilierbenin; charset=UTF8',
        'root',
        ''
    );
}

$error = ['error' => false];
$action = '';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

function str_random($length)
{
    $alphabet =
        '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';

    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

// obtenir le titre de la page
function PageName()
{
    return substr(
        $_SERVER['SCRIPT_NAME'],
        strrpos($_SERVER['SCRIPT_NAME'], '/') + 1
    );
}

$current_page = PageName();

//controle des input
function verifyInput($inputContent)
{
    $inputContent = htmlspecialchars($inputContent);

    $inputContent = trim($inputContent);

    return $inputContent;
}

function register()
{
    $pdo = getConnexion();
    if (!empty($_POST)) {

        $errors = [];

        if (empty($_POST['first_name'])) {
            $errors['first_name'] = 'Veuillez vérifier le prénom';
        }

        if (empty($_POST['last_name'])) {
            $errors['last_name'] = 'Veuillez vérifier le nom';
        }

        if (
            empty($_POST['email']) ||
            !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        ) {
            $errors['email'] = 'Please check the email';
        } else {
            $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
            $req->execute([$_POST['email']]);
            $user = $req->fetch();
            if ($user) {
                $errors['email'] = 'Email déjà enregistré';
            }
        }

        if (empty($_POST['username'])) {
            $errors['username'] = "Veuillez vérifier le nom d'utilisateur";
        } else {
            $req = $pdo->prepare('SELECT id FROM users WHERE username = ?');
            $req->execute([$_POST['username']]);
            $user = $req->fetch();
            if ($user) {
                $errors['username'] = "Nom d'utilisateur déjà pris";
            }
        }

        if (empty($_POST['password1'])) {
            $errors['password1'] = 'Veuillez vérifier le mote de passe';
        }

        if ($_POST['password2'] != $_POST['password1']) {
            $errors['password2'] = 'Veuillez confirmer le mot de passe';
        }

        if (empty($_POST['phone_code'])) {
            $errors['phone_code'] =
                "Veuillez vérifier l'indicatif téléphonique";
        }

        if (empty($_POST['phone_number'])) {
            $errors['phone_number'] =
                'Veuillez vérifier le numéro de téléphone';
        }

        if (!empty($errors)) {
            include 'errors.php';

            $_SESSION['registration'] = [
                'first_name' => verifyInput($_POST['first_name']),
                'last_name' => verifyInput($_POST['last_name']),
                'email' => verifyInput($_POST['email']),
                'phone_code' => verifyInput($_POST['phone_code']),
                'phone_number' => verifyInput($_POST['phone_number']),
                'username' => verifyInput($_POST['username']),
                'password1' => verifyInput($_POST['password1']),
            ];

            header('Location: ' . $register);
        }
        if (empty($errors)) {
            $email = verifyInput($_POST['email']);
            $first_name = verifyInput($_POST['first_name']);
            $last_name = verifyInput($_POST['last_name']);
            $phone_code = verifyInput($_POST['phone_code']);
            $phone_number = verifyInput($_POST['phone_number']);
            $password = password_hash($_POST['password1'], PASSWORD_BCRYPT);
            $username = verifyInput($_POST['username']);
            $token = str_random(20);
            $req = $pdo->prepare(
                "INSERT INTO users SET
                        date_of_insertion = NOW(),
                         first_name = ?, last_name = ?,
                        email = ?, phone_code = ?, phone_number = ?,
                        status = 'Active', token = ?,
                        role = 'user', username = ?, pass = ?,  verification = 'Not verified',
                        ads = 0 "
            );
            $req->execute([
                $first_name,
                $last_name,
                $email,
                $phone_code,
                $phone_number,
                $token,
                $username,
                $password,
            ]);

            $user_id = $pdo->lastInsertId();
            $pic = time() . '_' . $_FILES['pic']['name'];
            $target = $img_folder . '/' . $pic;

            if (move_uploaded_file($_FILES['pic']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE users SET
                    pic = ? WHERE id = ? ");

                $req->execute([$pic, $user_id]);
            }

            $_SESSION['user'] = [
                'id' => $pdo->lastInsertId(),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone_code' => $phone_code,
                'phone_number' => $phone_number,
                'username' => $username,
                'role' => 'user',
            ];
        }
        ?>
<script>
alert(
    "Création de compte réussie, bienvenue à Immobilier Bénin"
);
window.location.replace($dashboard);
</script>
<?php
    }
}

function search()
{
    $pdo = getConnexion();
    if (!empty($_POST)) {
        $errors = [];

        if (empty($_POST['type'])) {
            $errors['type'] = 'Veuillez préciser le type de bien';
        }

        if (empty($_POST['action'])) {
            $errors['action'] = 'Veuillez préciser la catégorie';
        }

        if (empty($_POST['location'])) {
            $errors['location'] = 'Veuillez préciser la ville';
        }

        if (!empty($errors)) {
            include 'errors.php';
        }
        if (empty($errors)) {
            $type = verifyInput($_POST['type']);
            $action = verifyInput($_POST['action']);
            $location = verifyInput($_POST['location']);

            $_SESSION['search'] = [
                'type' => $type,
                'action' => $action,
                'location' => $location,
            ];

            header('Location: ../index.php?action=results');
            exit(0);
        }
    }
}

function getMyAds()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT *  FROM ads
    WHERE seller_id = ? ORDER BY id DESC");
    $req->execute([$_SESSION['user']['id']]);
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
}

function iterAds($user_id)
{
    $pdo = getConnexion();
    $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute([$user_id]);

    while ($datas = $req->fetch()) {
        $old_ads_Nbr = $datas['ads'];
    }
    $req->closeCursor();

    $new_ads_Nbr = $old_ads_Nbr + 1;
    $sql = $pdo->prepare('UPDATE users SET ads = ? WHERE id = ?');
    $sql->execute([$new_ads_Nbr, $user_id]);
}

function addHouse()
{
    $pdo = getConnexion();
    if (!empty($_POST)) {
        $errors = [];
        if (empty($_POST['name'])) {
            $errors['name'] = 'Nom non valide';
        }

        if (empty($_POST['price'])) {
            $errors['price'] = 'Veuillez définir le prix';
        }

        if (empty($_POST['action'])) {
            $errors['action'] = "Veuillez définir l'action";
        }

        if (empty($_POST['description'])) {
            $errors['description'] = 'Veuillez définir la description';
        }
        if (empty($_POST['rooms'])) {
            $errors['action'] = 'Veuillez définir le nombre de chambres';
        }
        if (empty($_POST['bathrooms'])) {
            $errors['bathrooms'] =
                'Veuillez définir le nombre de salles de bains';
        }

        if (empty($_POST['living_rooms'])) {
            $errors['living_rooms'] = 'Veuillez définir le nombre de salons';
        }
        if (empty($_POST['location'])) {
            $errors['location'] = 'Veuillez définir la localisation';
        }

        if (empty($_POST['area'])) {
            $errors['area'] = 'Veuillez définir le quartier';
        }

        $_SESSION['item'] = [
            'name' => verifyInput($_POST['name']),
            'price' => verifyInput($_POST['price']),
            'location' => verifyInput($_POST['location']),
            'area' => verifyInput($_POST['area']),
            'description' => verifyInput($_POST['description']),
            'action' => verifyInput($_POST['action']),
            'more_description' => verifyInput($_POST['more_description']),
            'rooms' => verifyInput($_POST['rooms']),
            'living_rooms' => verifyInput($_POST['living_rooms']),
            'bathrooms' => verifyInput($_POST['bathrooms']),
        ];

        if (!empty($errors)) {
            include 'errors.php';
        }

        if (empty($errors)) {

            $name = verifyInput($_POST['name']);
            $price = verifyInput($_POST['price']);
            $location = verifyInput($_POST['location']);
            $area = verifyInput($_POST['area']);
            $description = verifyInput($_POST['description']);
            $action = verifyInput($_POST['action']);
            $more_description = verifyInput($_POST['more_description']);
            $rooms = verifyInput($_POST['rooms']);
            $living_rooms = verifyInput($_POST['living_rooms']);
            $bathrooms = verifyInput($_POST['bathrooms']);

            //On insere dans la table
            $sql = $pdo->prepare('INSERT INTO ads SET  date_of_insertion = NOW(),
                         name = ?, price = ?, description = ?,
                         area = ?,
                         rooms = ?, bathrooms = ?, living_rooms = ?,
                          location =?, action = ?, type = "Maison",
                         status ="Disponible", seller_id = ? ');

            $sql->execute([
                $name,
                $price,
                $description,
                $area,
                $rooms,
                $bathrooms,
                $living_rooms,
                $location,
                $action,
                $_SESSION['user']['id'],
            ]);
            $item_id = $pdo->lastInsertId();

            //more description
            if (!empty($_POST['more_description'])) {
                $sql = $pdo->prepare(
                    'UPDATE ads SET more_description = ? WHERE id = ?'
                );
                $sql->execute([$more_description, $item_id]);
            }

            //images
            $pic1 = time() . '_' . $_FILES['pic1']['name'];
            $pic2 = time() . '_' . $_FILES['pic2']['name'];
            $pic3 = time() . '_' . $_FILES['pic3']['name'];
            $pic4 = time() . '_' . $_FILES['pic4']['name'];
            $pic5 = time() . '_' . $_FILES['pic5']['name'];
            $pic6 = time() . '_' . $_FILES['pic6']['name'];
            $pic7 = time() . '_' . $_FILES['pic7']['name'];

            $target = '../public/img/' . $pic1;

            if (move_uploaded_file($_FILES['pic1']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic1 = ? WHERE id = ? ");

                $req->execute([$pic1, $item_id]);
            }

            $target = '../public/img/' . $pic2;

            if (move_uploaded_file($_FILES['pic2']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic2 = ? WHERE id = ? ");

                $req->execute([$pic2, $item_id]);
            }

            $target = '../public/img/' . $pic3;

            if (move_uploaded_file($_FILES['pic3']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic3 = ? WHERE id = ? ");

                $req->execute([$pic3, $item_id]);
            }

            $target = '../public/img/' . $pic4;

            if (move_uploaded_file($_FILES['pic4']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic4 = ? WHERE id = ? ");

                $req->execute([$pic4, $item_id]);
            }

            $target = '../public/img/' . $pic5;

            if (move_uploaded_file($_FILES['pic5']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic5 = ? WHERE id = ? ");

                $req->execute([$pic5, $item_id]);
            }

            $target = '../public/img/' . $pic6;

            if (move_uploaded_file($_FILES['pic6']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic6 = ? WHERE id = ? ");

                $req->execute([$pic6, $item_id]);
            }

            $target = '../public/img/' . $pic7;

            if (move_uploaded_file($_FILES['pic7']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic7 = ? WHERE id = ? ");

                $req->execute([$pic7, $item_id]);
            }
            iterAds($_SESSION['user']['id']);
            ?>
<script>
alert('Nouvelle annonce publiée avec succès !');
window.location.replace('../index.php?action=dashboard');
</script>
<?php
        }
    }
}

function addAppartment()
{
    $pdo = getConnexion();
    if (!empty($_POST)) {
        $errors = [];
        if (empty($_POST['name'])) {
            $errors['name'] = 'Nom non valide';
        }

        if (empty($_POST['price'])) {
            $errors['price'] = 'Veuillez définir le prix';
        }

        if (empty($_POST['action'])) {
            $errors['action'] = "Veuillez définir l'action";
        }

        if (empty($_POST['description'])) {
            $errors['description'] = 'Veuillez définir la description';
        }
        if (empty($_POST['rooms'])) {
            $errors['action'] = 'Veuillez définir le nombre de chambres';
        }
        if (empty($_POST['bathrooms'])) {
            $errors['bathrooms'] =
                'Veuillez définir le nombre de salles de bains';
        }

        if (empty($_POST['living_rooms'])) {
            $errors['living_rooms'] = 'Veuillez définir le nombre de salons';
        }
        if (empty($_POST['location'])) {
            $errors['location'] = 'Veuillez définir la localisation';
        }

        if (empty($_POST['area'])) {
            $errors['area'] = 'Veuillez définir le quartier';
        }

        $_SESSION['item'] = [
            'name' => verifyInput($_POST['name']),
            'price' => verifyInput($_POST['price']),
            'location' => verifyInput($_POST['location']),
            'area' => verifyInput($_POST['area']),
            'description' => verifyInput($_POST['description']),
            'action' => verifyInput($_POST['action']),
            'more_description' => verifyInput($_POST['more_description']),
            'rooms' => verifyInput($_POST['rooms']),
            'living_rooms' => verifyInput($_POST['living_rooms']),
            'bathrooms' => verifyInput($_POST['bathrooms']),
        ];

        if (!empty($errors)) {
            include 'errors.php';
        }

        if (empty($errors)) {

            $name = verifyInput($_POST['name']);
            $price = verifyInput($_POST['price']);
            $location = verifyInput($_POST['location']);
            $area = verifyInput($_POST['area']);
            $description = verifyInput($_POST['description']);
            $action = verifyInput($_POST['action']);
            $more_description = verifyInput($_POST['more_description']);
            $rooms = verifyInput($_POST['rooms']);
            $living_rooms = verifyInput($_POST['living_rooms']);
            $bathrooms = verifyInput($_POST['bathrooms']);

            //On insere dans la table
            $sql = $pdo->prepare('INSERT INTO ads SET  date_of_insertion = NOW(),
                         name = ?, price = ?, description = ?,
                         rooms = ?, bathrooms = ?, living_rooms = ?,
                          location =?, area = ?, action = ?, type = "Appartement",
                         status ="Disponible", seller_id = ? ');

            $sql->execute([
                $name,
                $price,
                $description,
                $rooms,
                $bathrooms,
                $living_rooms,
                $location,
                $area,
                $action,
                $_SESSION['user']['id'],
            ]);
            $item_id = $pdo->lastInsertId();

            //more description
            if (!empty($_POST['more_description'])) {
                $sql = $pdo->prepare(
                    'UPDATE ads SET more_description = ? WHERE id = ?'
                );
                $sql->execute([$more_description, $item_id]);
            }

            //images
            $pic1 = time() . '_' . $_FILES['pic1']['name'];
            $pic2 = time() . '_' . $_FILES['pic2']['name'];
            $pic3 = time() . '_' . $_FILES['pic3']['name'];
            $pic4 = time() . '_' . $_FILES['pic4']['name'];
            $pic5 = time() . '_' . $_FILES['pic5']['name'];
            $pic6 = time() . '_' . $_FILES['pic6']['name'];
            $pic7 = time() . '_' . $_FILES['pic7']['name'];

            $target = '../public/img/' . $pic1;

            if (move_uploaded_file($_FILES['pic1']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic1 = ? WHERE id = ? ");

                $req->execute([$pic1, $item_id]);
            }

            $target = '../public/img/' . $pic2;

            if (move_uploaded_file($_FILES['pic2']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic2 = ? WHERE id = ? ");

                $req->execute([$pic2, $item_id]);
            }

            $target = '../public/img/' . $pic3;

            if (move_uploaded_file($_FILES['pic3']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic3 = ? WHERE id = ? ");

                $req->execute([$pic3, $item_id]);
            }

            $target = '../public/img/' . $pic4;

            if (move_uploaded_file($_FILES['pic4']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic4 = ? WHERE id = ? ");

                $req->execute([$pic4, $item_id]);
            }

            $target = '../public/img/' . $pic5;

            if (move_uploaded_file($_FILES['pic5']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic5 = ? WHERE id = ? ");

                $req->execute([$pic5, $item_id]);
            }

            $target = '../public/img/' . $pic6;

            if (move_uploaded_file($_FILES['pic6']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic6 = ? WHERE id = ? ");

                $req->execute([$pic6, $item_id]);
            }

            $target = '../public/img/' . $pic7;

            if (move_uploaded_file($_FILES['pic7']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic7 = ? WHERE id = ? ");

                $req->execute([$pic7, $item_id]);
            }
            iterAds($_SESSION['user']['id']);
            ?>
<script>
alert('Nouvelle annonce publiée avec succès !');
window.location.replace('../index.php?action=dashboard');
</script>
<?php
        }
    }
}

function parameters()
{
    if (!empty($_POST)) {
        $pdo = getConnexion();
        $errors = [];

        if (!empty($_POST['pass1'])) {
            if (!empty($_POST['pass2'])) {
                if ($_POST['pass1'] == $_POST['pass2']) {
                    $password = password_hash($_POST['pass1'], PASSWORD_BCRYPT);
                } else {
                    $errors['pass2'] = 'Les mots de passe ne correspondent pas';
                }
            } else {
                $errors['pass2'] = 'Vous devez confirmer le mot de passe';
            }
        }

        if ($errors) {
            include 'errors.php';
        }

        if (empty($errors)) {

            if (!empty($_POST['username'])) {
                $username = verifyInput($_POST['username']);

                //on verifie que le nom n'est pas utilisé
                $sql = $pdo->prepare('SELECT * FROM users WHERE username = ?');
                $sql->execute([$username]);
                $datas = $sql->fetch();

                if ($datas) { ?>
<script>
alert("Ce nom d'utilisateur est déjà pris");
//window.location.replace("../parametres.php");
exit();
</script>

<?php } else {$req = $pdo->prepare(
                        'UPDATE users SET username = ? WHERE id = ?'
                    );
                    $req->execute([$username, $_SESSION['user']['id']]);}
            }

            /*
            if (!empty($_POST['phone_code'])) {
                $phone_code = verifyInput($_POST['phone_code']);

                $req = $pdo->prepare(
                    'UPDATE users SET phone_code = ? WHERE id = ?'
                );
                $req->execute([$phone_code, $_SESSION['user']['id']]);
            }

            if (!empty($_POST['phone_number'])) {
                $phone_number = verifyInput($_POST['phone_number']);

                $req = $pdo->prepare(
                    'UPDATE users SET phone_number = ? WHERE id = ?'
                );
                $req->execute([$phone_number, $_SESSION['user']['id']]);
            }
            */

            if (!empty($_POST['pass1'])) {
                if (!empty($_POST['pass2'])) {
                    if ($_POST['pass1'] == $_POST['pass2']) {
                        $req = $pdo->prepare(
                            'UPDATE users SET pass = ? WHERE id = ?'
                        );
                        $req->execute([$password, $_SESSION['user']['id']]);
                    }
                }
            }
            ?>
<script>
alert("Changements enregistrés avec succès, ils seront appliqués dès votre prochaine connexion");
window.location.replace($dashboard);
</script>
<?php
        }
    }
}

function addLand()
{
    $pdo = getConnexion();
    if (!empty($_POST)) {
        $errors = [];
        if (empty($_POST['name'])) {
            $errors['name'] = 'Veuillez définir le nom';
        }

        if (empty($_POST['price'])) {
            $errors['price'] = 'Veuillez définir le prix';
        }

        if (empty($_POST['action'])) {
            $errors['action'] = "Veuillez définir l'action";
        }

        if (empty($_POST['description'])) {
            $errors['description'] = 'Veuillez définir la description';
        }

        if (empty($_POST['size'])) {
            $errors['size'] = 'Veuillez définir la superficie en m2';
        }
        if (empty($_POST['location'])) {
            $errors['location'] = 'Veuillez définir la localisation';
        }

        if (empty($_POST['area'])) {
            $errors['area'] = 'Veuillez définir le quartier';
        }

        if (!empty($errors)) {
            $_SESSION['item'] = [
                'name' => verifyInput($_POST['name']),
                'price' => verifyInput($_POST['price']),
                'location' => verifyInput($_POST['location']),
                'area' => verifyInput($_POST['area']),
                'description' => verifyInput($_POST['description']),
                'action' => verifyInput($_POST['action']),
                'more_description' => verifyInput($_POST['more_description']),
                'size' => verifyInput($_POST['size']),
                'pic1' => verifyInput($_POST['pic1']),
            ];
            include 'errors.php';
        }

        if (empty($errors)) {

            $name = verifyInput($_POST['name']);
            $price = verifyInput($_POST['price']);
            $area = verifyInput($_POST['area']);
            $location = verifyInput($_POST['location']);
            $description = verifyInput($_POST['description']);
            $action = verifyInput($_POST['action']);
            $more_description = verifyInput($_POST['more_description']);
            $size = verifyInput($_POST['size']);

            //On insere dans la table
            $sql = $pdo->prepare('INSERT INTO ads SET  date_of_insertion = NOW(),
                         name = ?, price = ?, description = ?,
                          location =?, area = ?, action = ?, type = "Terrain",
                         status ="Disponible", seller_id = ?, size = ? ');

            $sql->execute([
                $name,
                $price,
                $description,
                $location,
                $area,
                $action,
                $_SESSION['user']['id'],
                $size,
            ]);
            $item_id = $pdo->lastInsertId();

            //more description
            if (!empty($_POST['more_description'])) {
                $sql = $pdo->prepare(
                    'UPDATE ads SET more_description = ? WHERE id = ?'
                );
                $sql->execute([$more_description, $item_id]);
            }

            //images
            $pic1 = time() . '_' . $_FILES['pic1']['name'];
            $pic2 = time() . '_' . $_FILES['pic2']['name'];
            $pic3 = time() . '_' . $_FILES['pic3']['name'];
            $pic4 = time() . '_' . $_FILES['pic4']['name'];
            $pic5 = time() . '_' . $_FILES['pic5']['name'];
            $pic6 = time() . '_' . $_FILES['pic6']['name'];
            $pic7 = time() . '_' . $_FILES['pic7']['name'];

            $target = '../public/img/' . $pic1;

            if (move_uploaded_file($_FILES['pic1']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic1 = ? WHERE id = ? ");

                $req->execute([$pic1, $item_id]);
            }

            $target = '../public/img/' . $pic2;

            if (move_uploaded_file($_FILES['pic2']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic2 = ? WHERE id = ? ");

                $req->execute([$pic2, $item_id]);
            }

            $target = '../public/img/' . $pic3;

            if (move_uploaded_file($_FILES['pic3']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic3 = ? WHERE id = ? ");

                $req->execute([$pic3, $item_id]);
            }

            $target = '../public/img/' . $pic4;

            if (move_uploaded_file($_FILES['pic4']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic4 = ? WHERE id = ? ");

                $req->execute([$pic4, $item_id]);
            }

            $target = '../public/img/' . $pic5;

            if (move_uploaded_file($_FILES['pic5']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic5 = ? WHERE id = ? ");

                $req->execute([$pic5, $item_id]);
            }

            $target = '../public/img/' . $pic6;

            if (move_uploaded_file($_FILES['pic6']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic6 = ? WHERE id = ? ");

                $req->execute([$pic6, $item_id]);
            }

            $target = '../public/img/' . $pic7;

            if (move_uploaded_file($_FILES['pic7']['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET
                    pic7 = ? WHERE id = ? ");

                $req->execute([$pic7, $item_id]);
            }

            iterAds($_SESSION['user']['id']);
            ?>
<script>
alert('Nouvelle annonce publiée avec succès !');
window.location.replace('../index.php?action=dashboard');
</script>
<?php
        }
    }
}

function contact()
{
    $pdo = getConnexion();
    if (!empty($_POST)) {

        $errors = [];

        if (empty($_POST['first_name'])) {
            $errors['first_name'] = 'Prénom non valide';
        }

        if (empty($_POST['last_name'])) {
            $errors['last_name'] = 'Nom non valide';
        }

        if (
            empty($_POST['email']) ||
            !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        ) {
            $errors['email'] = 'Email non valide';
        }

        if (empty($_POST['subject'])) {
            $errors['subject'] = "Veuillez sélectionner l'objet du message";
        }

        if (empty($_POST['message'])) {
            $errors['message'] = 'Veuillez entrer un message';
        }

        if (empty($errors)) {
            $email = verifyInput($_POST['email']);
            $first_name = verifyInput($_POST['first_name']);
            $last_name = verifyInput($_POST['last_name']);
            $phone_code = verifyInput($_POST['phone_code']);
            $phone_number = verifyInput($_POST['phone_number']);
            $subject = verifyInput($_POST['subject']);
            $branch = verifyInput($_POST['branch']);

            if ($branch = 'tech') {
                $receiver = 'adekambirachad@gmail.com';
                $message = 'Email expediteur: ' . $email . ' <br>';
                $message .=
                    'Nom expediteur: ' .
                    $first_name .
                    ' ' .
                    $last_name .
                    ' <br>';
                $message .= verifyInput($_POST['message']);

                // sendmail($subject, $message, $receiver);
                echo 'ok tech';
            } else {
                $receiver = 'xnetwork32@gmail.com';
                $message = 'Email expediteur: ' . $email . ' <br>';
                $message .=
                    'Nom expediteur: ' .
                    $first_name .
                    ' ' .
                    $last_name .
                    ' <br>';
                $message .= verifyInput($_POST['message']);

                // sendmail($subject, $message, $receiver);
                echo 'ok admin';
            }

            //insert into databases
            $sql = $pdo->prepare('INSERT INTO messages SET date_of_insertion = NOW(),
            first_name = ?, last_name = ?, email = ?, phone_code = ?, phone_number =?,
            branch = ?, message = ?, subject = ?, receiver_id = 1');
            $sql->execute([
                $first_name,
                $last_name,
                $email,
                $phone_code,
                $phone_number,
                $branch,
                $message,
                $subject,
            ]);
        }
        ?>
<script>
alert("Votre message a été envoyé, nous vous répondrons dans les plus brefs délais");
window.location.replace("./index.php");
</script>
<?php
    }
}

function contactForAd($item_id)
{
    $pdo = getConnexion();
    if (!empty($_POST)) {

        $errors = [];

        if (empty($_POST['first_name'])) {
            $errors['first_name'] = 'Veuillez renseigner vos prénoms';
        }

        if (empty($_POST['last_name'])) {
            $errors['last_name'] = 'Veuillez renseigner votre nom';
        }

        if (empty($_POST['phone_code'])) {
            $errors['phone_code'] = "Veuillez renseigner l'indicatif";
        }

        if (empty($_POST['phone_number'])) {
            $errors['phone_number'] =
                'Veuillez renseigner le numéro de téléphone';
        }

        if (empty($_POST['email'])) {
            $errors['email'] = "Veuillez définir l'email";
        }
        if (!empty($errors)) {
            include 'errors.php';
        }

        if (empty($errors)) {
            $item_id = verifyInput($_GET['id']);
            $email = verifyInput($_POST['email']);
            $first_name = verifyInput($_POST['first_name']);
            $last_name = verifyInput($_POST['last_name']);
            $phone_code = verifyInput($_POST['phone_code']);
            $phone_number = verifyInput($_POST['phone_number']);
            $subject = 'Annonce numero ' . $item_id;

            echo 'id = ' . $item_id;

            //on recupere les infos de l'annonce

            $req = $pdo->prepare('SELECT * FROM ads WHERE id = ?');
            $req->execute([$item_id]);
            while ($datas = $req->fetch()) {
                $seller_id = $datas['id'];
                $seller_email = $datas['email'];
            }

            $receiver_id = $seller_id;

            $receiver = $seller_email;
            $message = 'Email expediteur: ' . $email . ' <br>';
            $message .=
                'Nom expediteur: ' . $first_name . ' ' . $last_name . ' <br>';
            $message .= verifyInput($_POST['message']);

            // sendmail($subject, $message, $receiver);
            echo $message;

            //insert into databases
            $sql = $pdo->prepare('INSERT INTO messages SET date_of_insertion = NOW(),
            first_name = ?, last_name = ?, email = ?, phone_code = ?, phone_number =?,
          message = ?, subject = ?, receiver_id = ?');
            $sql->execute([
                $first_name,
                $last_name,
                $email,
                $phone_code,
                $phone_number,
                $message,
                $subject,
                $receiver_id,
            ]);
        }
        ?>
<script>
alert("Votre message a été envoyé avec succès !");
window.location.replace("./index.php?action=item&id=<?= $item_id ?>");
</script>
<?php
    }
}

function login()
{
    if (!empty($_POST)) {
        $pdo = getConnexion();

        $errors = [];

        if (
            isset($_POST['username'], $_POST['pass']) &&
            !empty($_POST['username'] && !empty($_POST['pass']))
        ) {
            $sql = 'SELECT * FROM `users` WHERE `username` = ?
            OR `email` = ?
';

            $query = $pdo->prepare($sql);

            $query->execute([
                verifyInput($_POST['username']),
                verifyInput($_POST['username']),
            ]);

            $user = $query->fetch();

            if (!$user) {
                $errors['username'] = 'Utilisateur/mot de passe incorrect';
            }

            if (!password_verify($_POST['pass'], $user['pass'])) {
                $errors['pass'] = 'Utilisateur/mot de passe incorrect';
            }

            if (!empty($errors)) {
                $response = [
                    'success' => false,
                    'message' => 'Identifiant ou mot de passe incorrect',
                ];
            }

            if (empty($errors)) {
                $_SESSION['user'] = [
                    'username' => $user['username'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'phone_code' => $user['phone_code'],
                    'phone_number' => $user['phone_number'],
                    'id' => $user['id'],
                    'role' => $user['role'],
                ];

                $response = [
                    'success' => true,
                    'message' => 'Connexion réussie',
                    'role' => $user['role'],
                ];
            }

            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            //  echo json_encode($response);
            exit();
        }
    }
}

function getUsers()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    users ORDER BY id DESC");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function getAppartments()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    ads WHERE type = 'Appartement' ORDER BY id DESC");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function getHouses()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    ads WHERE type = 'Maison' ORDER BY id DESC");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function getLands()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    ads WHERE type = 'Terrain' ORDER BY id DESC");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function getAd($id)
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    ads WHERE id = ?
     ORDER BY id DESC");
    $req->execute([$id]);
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function getAdsByLocation($location)
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    ads WHERE location = ?
     ORDER BY id DESC");
    $req->execute([$location]);
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function getThreeAds()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    ads ORDER BY id DESC LIMIT 3");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function getAds()
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    ads ORDER BY id");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function getUser($id)
{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM
    users WHERE id = ?
    ORDER BY id DESC");
    $req->execute([$id]);
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function logout()
{
    unset($_SESSION['user']);

    header('Location: http://127.0.0.1:8080/');
}

if ($action == 'login') {
    login();
}

if ($action == 'register') {
    register();
}

if ($action == 'search') {
    search();
}

if ($action == 'contact') {
    contact();
}

if ($action == 'contactForAd') {
    contactForAd($id);
}

if ($action == 'addHouse') {
    addHouse();
}

if ($action == 'addAppartment') {
    addAppartment();
}

if ($action == 'addLand') {
    addLand();
}

if ($action == 'logout') {
    logout();
}

if ($action == 'parameters') {
    parameters();
}

function sendJSON($infos)
{
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}