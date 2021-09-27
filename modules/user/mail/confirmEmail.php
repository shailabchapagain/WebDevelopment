<?php

use app\modules\user\models\Profile;
use app\modules\user\models\User;
use app\modules\user\models\UserToken;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var string $subject
 * @var User $user
 * @var Profile $profile
 * @var UserToken $userToken
 */

$url = Url::toRoute(["/user/confirm", "token" => $userToken->token], true);
$notify = Url::to(["/user/report"], true);


?>

<p><?= Yii::t("user", "

<tr>
    <td>
        <p>Hello there,</p>
        <p> Welcome to TDot Academy. You are all set to go after you click the button below to complete your registration process. </p>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary'>
            <tbody>
            <tr>
                <td align='left'>
                    <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                        <tbody>
                        <tr>
                            <td> <a href=$url target='_blank'>Confirm Email Address</a> </td>
                            
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        
       <p> If this doesn't work paste the link below on a browser : <br> $url </p>
       <br><br>
    </td>
</tr>

") ?></p>