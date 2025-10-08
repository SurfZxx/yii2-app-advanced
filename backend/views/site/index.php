<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div id="panel" class="row">
            <div class="col-lg-4">
                <h2>Products</h2>

                <p>Manage your products. Create, edit and delete your products. Yes, I wasted time writing this.</p>

                <p><a class="btn btn-outline-secondary" href="<?= \yii\helpers\Url::to(['site/products']) ?>">Products Manager &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Upload</h2>

                <p>Upload a file into the app. Yes, I wasted time writing this.</p>

                <p><a class="btn btn-outline-secondary" href="<?= \yii\helpers\Url::to(['site/file-uploader']) ?>">File Uploader &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>In development...</h2>

                <p>This is still under development. Don't worry it'll only take a week. Yes, I wasted time writing this.</p>

                <p><a class="btn btn-outline-secondary" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&list=RDdQw4w9WgXcQ&start_radio=1&pp=ygUmUmljayBBc3RsZXkgLSBOZXZlciBHb25uYSBHaXZlIFlvdSBVcCCgBwE%3D">Surprise &raquo;</a></p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-4">
                <h2>About</h2>

                <p>Just to work on js with yii2. Yes, I wasted time writing this.</p>

                <p><a id="btn_learn_more" class="btn btn-outline-secondary" href="#">Learn more about Yii Framework &raquo;</a></p>
                <p><a id="btn_question" class="btn btn-outline-secondary" href="#" style="display: none;">Are you sure? &raquo;</a></p>
                <p><a id="btn_question_2" class="btn btn-outline-secondary" href="#" style="display: none;">Are you really sure? &raquo;</a></p>
                <div id="btn_question_group" style="display: flex; gap: 10px; display: none;">
                    <a id="btn_question_yes" class="btn btn-outline-secondary" href="#" style="display: none;">Yes! &raquo;</a>
                    <a id="btn_question_no" class="btn btn-outline-secondary" href="#" style="display: none;">No! &raquo;</a>
                </div>
            </div>

        </div>

    </div>
</div>

<?php if ($products < 5): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var btnLearnMore = document.getElementById('btn_learn_more');
        var btnQuestion = document.getElementById('btn_question');
        var btnQuestion2 = document.getElementById('btn_question_2');
        if (btnLearnMore && btnQuestion && btnQuestion2) {
            btnLearnMore.addEventListener('click', function(e) {
                e.preventDefault();
                btnLearnMore.style.display = 'none';
                btnQuestion.style.display = '';
            });
            btnQuestion.addEventListener('click', function(e) {
                e.preventDefault();
                btnQuestion.style.display = 'none';
                btnQuestion2.style.display = '';
            });
            btnQuestion2.addEventListener('click', function(e) {
                e.preventDefault();
                btnQuestion2.style.display = 'none';
                var btnGroup = document.getElementById('btn_question_group');
                var btnYes = document.getElementById('btn_question_yes');
                var btnNo = document.getElementById('btn_question_no');
                if (btnGroup && btnYes && btnNo) {
                    btnGroup.style.display = 'flex';
                    btnYes.style.display = '';
                    btnNo.style.display = '';
                }
            });
        }
    });
</script>
<?php else: ?>
<script>
    function Cycle(array) {
        var i = 0;
        this.next = function () {
            i %= array.length;
            return array[i++];
        }
    }


    document.addEventListener('DOMContentLoaded', function() {
        // You can put alternative JS here for $products >= 5
        // Example: alert('You have 5 or more products!');
        var btnLearnMore = document.getElementById('btn_learn_more');
        var btnQuestion = document.getElementById('btn_question');
        var btnQuestion2 = document.getElementById('btn_question_2');
        var btnGroup = document.getElementById('btn_question_group');
        if (btnLearnMore && btnQuestion && btnQuestion2 && btnGroup) {
            btnLearnMore.style.display = 'none';
            btnQuestion.style.display = 'none';
            btnQuestion2.style.display = 'none';
            btnGroup.style.display = 'none';
            var colors = new Cycle(['rgb(255,0,0)','rgb(0,255,0)', 'rgb(0,0,255)']);
            $('#panel').css('background-color', colors.next());
            setInterval(function () {
            $('#panel').css('background-color', colors.next())
            }, 500);
        }
    });
</script>
<?php endif; ?>

