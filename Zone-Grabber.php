<?php
#-----------------------------🌿 RedshoT 🌿-------------------------------#
//Files

include 'config/roote.php';

if (!is_dir(FOLDER)) {
    mkdir(FOLDER);
}

#-----------------------------🌿 RedshoT 🌿-------------------------------#

echo $logo[array_rand($logo) ];

echo "\r\n--=[ Please Enter ZHE From Your Cookies --> ";

$ZHE = trim(fgets(STDIN));

echo "\r\n--=[ Please Enter PHPSESSID From Your Cookies --> ";

$PHPSESSID = trim(fgets(STDIN));


echo "\r\n--=[ Please Enter Notifier Name --> ";

$notifier = trim(fgets(STDIN));

echo "\r\n--=[ Please Enter Page Numbers --> ";

$pages = trim(fgets(STDIN));

if (empty($ZHE) && empty($PHPSESSID) && empty($pages))

die("Err :( ");

#-----------------------------🌿 RedshoT 🌿-------------------------------#

for ($i = 1;$i <= $pages;$i++)
{

    $sites = source('http://www.zone-h.org/archive/notifier=' . $notifier . '/page=' . $i, $ZHE, $PHPSESSID);

    if ($sites)

    {
        foreach ($sites as $site)

        {

            $xxx = "http://$site\r\n";

            preg_match_all('/http:\/\/(.*?)\//', $xxx, $Done);

            foreach ($Done[1] as $lolxd)

            {

                $lolx = "http://$lolxd\r\n";

                echo $lolx;

                $lol = fopen(FOLDER ."/{$notifier}.txt", 'a+');

                fwrite($lol, $lolx);

            }
        }

    }
    else
    {
        echo "\r\n\t--=[  Error, Captcha Detected :( \n\n";

        continue;

    }
}

echo "\n";

#-----------------------------🌿 RedshoT 🌿-------------------------------#

echo "DONE with | " . count(file(FOLDER."/".$notifier . ".txt")) . " | Website SAVED in to ->  " . FOLDER."/".$notifier . ".txt";
echo " 🖤🌿 Developed By RedshoT 🖤🌿 ";
@unlink("config/cookie.txt");

#-----------------------------🌿 RedshoT 🌿-------------------------------#

?>
