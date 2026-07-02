<?php
/**
 * CONCEPT 1: PHP Sessions
 * Unlike JavaScript, which stays loaded in the browser, PHP forgets everything 
 * the millisecond the page finishes loading. To keep track of the game score 
 * across multiple rounds, we must start a 'session'.
 */
session_start();

// If the score variables don't exist yet, initialize them at 0
if (!isset($_SESSION['wins'])) {
    $_SESSION['wins'] = 0;
    $_SESSION['losses'] = 0;
    $_SESSION['ties'] = 0;
}

// Reset Game Logic: If the user clicks "Reset", wipe the scores
if (isset($_POST['reset'])) {
    $_SESSION['wins'] = 0;
    $_SESSION['losses'] = 0;
    $_SESSION['ties'] = 0;
    header("Location: index.php"); // Refresh page to clear old form data
    exit();
}

// --- CORE GAME LOGIC ---
$choices = ['Rock', 'Paper', 'Scissors'];
$playerChoice = '';
$computerChoice = '';
$resultMessage = 'Choose your weapon to start the game!';

/**
 * CONCEPT 2: Handling Form Submissions ($_POST)
 * This checks if the user submitted the form by clicking one of the gameplay buttons.
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['choice'])) {
    
    // 1. Capture the player's choice from the form button value
    $playerChoice = $_POST['choice'];

    // 2. Make the computer pick randomly. 
    $randomKey = array_rand($choices);
    $computerChoice = $choices[$randomKey];

    // 3. Determine the winner using conditional logic
    if ($playerChoice === $computerChoice) {
        $resultMessage = "It's a tie! Both picked $playerChoice.";
        $_SESSION['ties']++;
    } 
    // Check all scenarios where the player wins
    elseif (
        ($playerChoice === 'Rock' && $computerChoice === 'Scissors') ||
        ($playerChoice === 'Paper' && $computerChoice === 'Rock') ||
        ($playerChoice === 'Scissors' && $computerChoice === 'Paper')
    ) {
        $resultMessage = "You win! $playerChoice beats $computerChoice.";
        $_SESSION['wins']++;
    } 
    // If it's not a tie and the player didn't win, they lost
    else {
        $resultMessage = "You lose! $computerChoice beats $playerChoice.";
        $_SESSION['losses']++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Rock, Paper, Scissors</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .game-card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align: center; max-width: 400px; width: 100%; }
        .btn { padding: 10px 20px; font-size: 16px; margin: 5px; cursor: pointer; border: none; border-radius: 5px; background: #007bff; color: white; transition: 0.2s; }
        .btn:hover { background: #0056b3; }
        .btn-reset { background: #dc3545; font-size: 12px; padding: 5px 10px; margin-top: 20px; }
        .btn-reset:hover { background: #bd2130; }
        .scoreboard { display: flex; justify-content: space-around; margin: 20px 0; background: #eee; padding: 10px; border-radius: 5px; }
        .result { font-weight: bold; font-size: 18px; margin: 20px 0; color: #333; }
    </style>
</head>
<body>

    <div class="game-card">
        <h1>Rock, Paper, Scissors</h1>
        
        <div class="scoreboard">
            <div>Wins: <strong><?php echo $_SESSION['wins']; ?></strong></div>
            <div>Losses: <strong><?php echo $_SESSION['losses']; ?></strong></div>
            <div>Ties: <strong><?php echo $_SESSION['ties']; ?></strong></div>
        </div>

        <p class="result"><?php echo $resultMessage; ?></p>

        <form action="index.php" method="POST">
            <button type="submit" name="choice" value="Rock" class="btn">Rock</button>
            <button type="submit" name="choice" value="Paper" class="btn">Paper</button>
            <button type="submit" name="choice" value="Scissors" class="btn">Scissors</button>
            <br>
            <button type="submit" name="reset" value="true" class="btn btn-reset">Reset Scores</button>
        </form>
    </div>

</body>
</html>
