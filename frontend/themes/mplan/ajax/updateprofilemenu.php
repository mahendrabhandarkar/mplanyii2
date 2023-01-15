<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use yii\web\View;
?>

<table width="100%" border="1">
<tbody>
<tr>
	<td>
<button id="update-profile-basicinfo" style="display:block"><b> Basic Info </b></button>
<?php
$url = Url::toRoute(['users/update-profile-basicinfo']);
$uid = Yii::$app->user->identity->id;
$js = <<<JS
$("#update-profile-basicinfo").on('click', function () {
    $.ajax({
        url: "{$url}",
        data: {id: {$uid}},
        type: "post",
        success: function(response){
            $("#update-profile-content").html(response);
        },
        error: function(response) {
            alert('ERROR');
        }
    });
});
JS;

$this->registerJs($js);
?>
	</td>
	<td>
<button id="update-profile-image" style="display:block"><b>Profile Image </b></button>
<?php
$url = Url::toRoute(['users/update-profile-image']);
$js = <<<JS
$("#update-profile-image").on('click', function () {
    $.ajax({
        url: "{$url}",
        data: {id: {$uid}},
        type: "post",
        success: function(response){
            $("#update-profile-content").html(response);
        },
        error: function(response) {
            alert('ERROR');
        }
    });
});
JS;

$this->registerJs($js);
?>
	</td>
	<td>
<button id="update-profile-educareer" style="display:block"><b>Education & Career </b></button>
<?php
$url = Url::toRoute(['users/update-profile-educareer']);
$js = <<<JS
$("#update-profile-educareer").on('click', function(response) {
    $.ajax({
        url: "{$url}",
        data: {id: {$uid}},
        type: "post",
        success: function(response){
            $("#update-profile-content").html(response);
        },
        error: function(response) {
            alert('ERROR');
        }
    });
});
JS;

$this->registerJs($js);
?>
	</td>
	<td>
	<button id="update-profile-background" style="display:block"><b> Background </b></button>
<?php
$url = Url::toRoute(['users/update-profile-background']);
$js = <<<JS
$("#update-profile-background").on('click', function () {
    $.ajax({
        url: "{$url}",
        data: {id: {$uid}},
        type: "post",
        success: function(response){
            $("#update-profile-content").html(response);
        },
        error: function(response) {
            alert('ERROR');
        }
    });
});
JS;

$this->registerJs($js);
?>
	</td>
	<td>
<button id="update-profile-family" style="display:block"><b>Family</b></button>
<?php
$url = Url::toRoute(['users/update-profile-family']);
$js = <<<JS
$("#update-profile-family").on('click', function () {
    $.ajax({
        url: "{$url}",
        data: {id: {$uid}},
        type: "post",
        success: function(response){
            $("#update-profile-content").html(response);
        },
        error: function(response) {
            alert('ERROR');
        }
    });
});
JS;

$this->registerJs($js);
?>
	</td>
	<td>
	<button id="update-profile-hobbies" style="display:block"><b>Hobbies</b></button>
<?php
$url = Url::toRoute(['users/update-profile-hobbies']);
$js = <<<JS
$("#update-profile-hobbies").on('click', function () {
    $.ajax({
        url: "{$url}",
        data: {id: {$uid}},
        type: "post",
        success: function(response){
            $("#update-profile-content").html(response);
        },
        error: function(response) {
            alert('ERROR');
        }
    });
});
JS;

$this->registerJs($js);
?>
	</td>
</tr>	
</tbody>
</table>

