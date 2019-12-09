<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<header>

</header>
<main>
    <form class="border border-light p-5">
        <div class="form-row justify-content-center align-items-center">
            <div class="col-5">
        <p class="h4 mb-4 text-left">Ad Details</p>
        <label for="textInput">Ad Type:</label>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultChecked" name="adType" checked>
            <label class="custom-control-label" for="defaultChecked">I am offering</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultUnchecked" name="AdType">
            <label class="custom-control-label" for="defaultUnchecked">I want</label>
        </div>
        <br>
        <label for="textInput">Furnished:</label>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultChecked" name="furnished" checked>
            <label class="custom-control-label" for="defaultChecked">Yes</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultUnchecked" name="furnished">
            <label class="custom-control-label" for="defaultUnchecked">No</label>
        </div>
        <br>
        <label for="textInput">Ad Title</label>
        <input type="text" id="textInput" class="form-control mb-4" placeholder="Should be populated">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="4"></textarea>
        </div>
        <p class="h4 mb-4 text-left">Media</p>
        <label for="textInput">Select Images :</label>
        <input type="file" name="img" multiple>
        <p class="h4 mb-4 text-left">Price</p>
        <label for="textInput">Price:</label>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultChecked" name="price" checked>
            $<input type="text" id="textInput" class="form-control mb-4" placeholder="">
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultUnchecked" name="price">
            <label class="custom-control-label" for="defaultUnchecked">Please Contact</label>
        </div>
        <br>
        <p class="h4 mb-4 text-left">Contact Information</p>
        <label for="textInput">Phone Number:</label>
        <input type="text" id="textInput" class="form-control mb-4" placeholder="Enter your Phone Number">
        <label for="textInput">Email:</label>
        <input type="text" id="textInput" class="form-control mb-4" placeholder="Enter your Email">
        <button class="btn btn-info btn-block my-4" type="submit">Post Your Ad</button>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</main>
<footer>

</footer>
</body>
</html>

