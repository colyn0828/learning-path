<!DOCTYPE html>
<html>
<head>
    <title>MadLib receive Post Forms</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <style type="text/css">

        form { /* Optional: Just to show how you can still style BS4 Forms */
            max-width: 500px;
        }
    </style>

</head>
<body>
<div class="container">
    <h1>MadLib Activity</h1>
    <form method="post" action="madLib-send-receive-post.php">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" name="firstname" id="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" name="lastname" id="lastname">
        </div>

        <p>Favourite Color</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="color" id="red" value="Red">
            <label class="form-check-label" for="red">
                Red
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="color" id="blue" value="Blue">
            <label class="form-check-label" for="blue">
                Blue
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="color" id="black" value="Black" checked>
            <label class="form-check-label" for="black">
                Black
            </label>
        </div>
        <br>

        <div class="form-group">
            <label for="clothing">Article of Clothing</label>
            <select class="form-control" name="clothing" id="clothing">
                <option>Academic Dress</option>
                <option>Active Wear</option>
                <option>Ball Dress</option>
                <option>Business Suit</option>
                <option>Evening Dress</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" name="age" id="age">
        </div>

        <div class="form-group">
            <label for="comments">Comments</label>
            <textarea class="form-control" name="comments" id="comments" rows="3"></textarea>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="newsletter" id="newsletter" value="1">
            <label class="form-check-label" for="newsletter">Newsletter</label>
        </div>
        <p>&nbsp;</p>
        <p><b>Gender</b></p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value="m" checked>
            <label class="form-check-label" for="male">
                Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="f">
            <label class="form-check-label" for="female">
                Female
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="undecided" value="u">
            <label class="form-check-label" for="undecided">
                Undecided
            </label>
        </div>
        <p>&nbsp;</p>

        <button type="submit" name="mysubmit" class="btn btn-primary">Tell me a story</button>
        <p>&nbsp;</p>
    </form>

    <?php
    if (isset($_POST['mysubmit'])) {
        $story = "Dabao dated many times, a long time, he found a strange rule.\n
        Dabao and the the girl always talked very happily.\n
        Sometimes they even could look at each other, but as long as he smoked, the other party immediately turned over.<br/>\n";
        $story .= "It's true that Dabao likes smoking, but he can't figure it out.\n
        Do girls hate smoking so much? What's more, when some girls leave, they leave behind one word: cheater.<br/>\n";
        $story .= "That day, Dabao went to date again. As before, at first, the girl was affectionate and smiling.\n
        After chatting happily for a while, Dabao wanted to smoke, but considering previous situations, Dabao dared not rashly smoke.\n
        He acted like a gentleman, polite and asked: \"sorry, can I smoke a cigarette?\"<br/>\n";
        $story .= "The girl said with a smile: \"of course you can, do not hide from me.\n
        I always think men smoking is a very dignified thing, both masculine and mature, you go ahead!\n
        It seems that Dabao succeeds this time.\n<br/>";
        $story .= "\nAnd the story continued...\n";

        if (isset($_POST['color'])) {
            $color = $_POST['color'];
            echo "<h3>Dabao's favourite color is : " . $color . "</h3>";
        }

        echo $story;
    }
    ?>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>