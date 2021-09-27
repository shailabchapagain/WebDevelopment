<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var string $subject
 * @var \app\modules\user\models\User $user
 * @var \app\modules\user\models\UserToken $userToken
 */

$url = Url::toRoute(["/user/reset", "token" => $userToken->token], true);
?>


<p><?= Yii::t("user", "

<tr>
    <td>
        <p>Hello there,</p>
        <p> Seems like you are having trouble logging into TDot Academy. Please Use the button below to reset your password. </p>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary'>
            <tbody>
            <tr>
                <td align='left'>
                    <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                        <tbody>
                        <tr>
                            <td> <a href=$url target='_blank'>Reset Password</a> </td>
                            
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        
       <p> If this doesn't work paste the link below on a browser : <br> $url </p>
       <br><br>
       If you think this was a mistake, please kindly ignore this message.
       <br>
    </td>
</tr>

") ?></p>

