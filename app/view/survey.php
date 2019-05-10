<?php

    $connection = mysqli_connect('localhost','root','','mumuso');
    mysqli_set_charset($connection,"utf8");

    function FindAnswer($answerId){
        global $connection;

        $query = "SELECT * FROM survey_answers WHERE Id = $answerId";

        $request = mysqli_query($connection, $query);

        return mysqli_fetch_assoc($request);
        
    }

    function IncreaseAnswerLikeCount($answerId){
        $answer = FindAnswer($answerId);

        global $connection;

        $LikeCount = $answer['LikeCount'] + 1;

        $query = "UPDATE  survey_answers SET LikeCount = $LikeCount WHERE Id = $answerId";

        $result = mysqli_query($connection, $query);

        if($result)
            echo 1;
        else
            echo 0;

    }

    function GetFirstSurveyAndQuestions(){

        global $connection;

        $query = "SELECT S.Id as SurveyId, S.Question as Question, SA.Id as AnswerId, SA.Text AnswerText, SA.LikeCount as AnswerLikeCount FROM survey as S INNER JOIN survey_answers AS SA ON S.Id = SA.surveyId";
        
        $request =  mysqli_query($connection,$query);
        
        $survey_question = [];

        if(mysqli_num_rows($request) > 0){
            
            while($answer =  mysqli_fetch_assoc($request)){
                $survey_question[] = $answer;
            }
        }

        return $survey_question;
    }
    // mysqli_close($connection);


?>

<?php 
    if(isset($_POST['IncreaseAnswerLikeCount'])){
        if(isset($_POST['answerId'])){
            $result =  IncreaseAnswerLikeCount($_POST['answerId']);
        }
    }
?>


<?php  $survey_question = GetFirstSurveyAndQuestions(); ?>

<?php if(!isset($_POST['ShowAnswers'])){ ?>

    <div style="width:300px; border: 3px solid #ddd; padding: 10px 15px">
        <div>
            <h4><?php echo $survey_question[0]['Question'] ?></h4>
        </div>
        <div class="questions">
            
            <form action="" method="POST">

                <?php foreach($survey_question as $key => $value){ ?>

                    <div class="question">
                        <label>
                            <input type="radio" name="answerId" class="answerId" id="answerId" value="<?php echo $value['AnswerId']?>">
                            <?php echo $value['AnswerText'] ?>
                        </label>
                    </div>
                
                <?php }?>

                <input type="hidden" name="IncreaseAnswerLikeCount" value="1">
                <button type="submit">Gönder</button>
            </form>
        
            <form method="POST" action="">
                    <input type="hidden" name="ShowAnswers" value="1">
                    <button>Sonuçları Göster</button>
            </form>


        </div>
    </div>

<?php }else {?>

    <?php $totalLikeCount =0; foreach($survey_question as $key => $value){ $totalLikeCount+=$value['AnswerLikeCount']; } ?>

    <?php foreach($survey_question as $key => $value){ ?>

            <?php $percent =  ($value['AnswerLikeCount']  / $totalLikeCount) * 100 ?>

            <span>
                <?php echo $value['AnswerText'] . '  ' . $value['AnswerLikeCount']  . ' / ' . $totalLikeCount  ?>
            </span>

            <div style="width: 200px; height: 20px; background-color:#1ABC9C">
                <div style="width:<?php echo $percent . 'px' ?>; height: 20px; background-color: #D2B4DE !important">
                    
                </div>
            </div>

    <?php }?>

<?php  }?>
