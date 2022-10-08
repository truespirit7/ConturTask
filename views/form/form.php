<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\Persons $model */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'phone') ?>
<?= $form->field($model, 'email') ?>
<div class="form-group" style="padding-top: 30px;">
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    <button id="clear" class="btn btn-secondary" style="margin-left: 30px;" onclick="this.form.reset();">Очистить форму</button>
</div>


<?php
ActiveForm::end()
?>




<?php
// отправка данных по ajax
$js = <<<JS
    $('form').on('beforeSubmit', function(){
       var data = $(this).serialize();
        $.ajax({
            url: '/form/form',
            type: 'POST',
            data: data,
            success: function(res){
                console.log(res);


            },
            error: function(){

            }
        });
        alert('Данные отправлены!');
        return false;
    });
JS;

$this->registerJs($js);
?>
