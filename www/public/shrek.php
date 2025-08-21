<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHREK SUPREMACY</title>
    <style>
        body {
            background: linear-gradient(135deg, #b6e36c 0%, #56ab2f 100%);
            font-family: 'Comic Sans MS', 'Comic Sans', cursive, sans-serif;
            color: #2e4d1c;
            text-align: center;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        h1 {
            font-size: 3em;
            margin-top: 20px;
            text-shadow: 2px 2px 12px #fff, 0 0 20px #56ab2f;
            letter-spacing: 2px;
            animation: shrek-glow 2s infinite alternate;
        }
        @keyframes shrek-glow {
            from { text-shadow: 0 0 10px #56ab2f, 0 0 20px #fff; }
            to { text-shadow: 0 0 30px #b6e36c, 0 0 40px #fff; }
        }
        .shrek-quote {
            font-size: 1.5em;
            margin: 20px 0;
            color: #3e6e22;
            font-style: italic;
            background: #eaffd0;
            border-radius: 12px;
            display: inline-block;
            padding: 10px 30px;
            box-shadow: 0 2px 12px #b6e36c88;
        }
        .shrek-img {
            border-radius: 20px;
            margin: 20px 0;
            box-shadow: 0 4px 16px rgba(44, 62, 80, 0.2);
            max-width: 90vw;
            border: 5px solid #56ab2f;
            background: #fff;
        }
        .shrek-buttons {
            margin: 30px 0;
        }
        button {
            background: #6ab04c;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            margin: 10px;
            font-size: 1.2em;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.15);
            transition: background 0.2s, transform 0.2s;
            font-family: inherit;
        }
        button:hover {
            background: #218c1e;
            transform: scale(1.08) rotate(-2deg);
        }
        .shrek-emoji {
            font-size: 2.5em;
            margin: 0 8px;
            vertical-align: middle;
            animation: bounce 1.2s infinite alternate;
        }
        @keyframes bounce {
            from { transform: translateY(0);}
            to { transform: translateY(-10px);}
        }
        .shrek-marquee {
            width: 100vw;
            background: #56ab2f;
            color: #fff;
            font-size: 1.3em;
            padding: 8px 0;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }
        .shrek-facts {
            background: #eaffd0;
            border-radius: 12px;
            display: inline-block;
            padding: 15px 30px;
            margin: 20px 0;
            box-shadow: 0 2px 12px #b6e36c88;
            text-align: left;
            max-width: 500px;
        }
        .shrek-facts ul {
            padding-left: 20px;
            font-size: 1.1em;
        }
        .shrek-audio {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="shrek-marquee">
        <span class="shrek-emoji">🧅</span>
        SHREK IS LOVE, SHREK IS LIFE!
        <span class="shrek-emoji">💚</span>
        ONIONS HAVE LAYERS, SHREK HAS LAYERS!
        <span class="shrek-emoji">🧅</span>
    </div>
    <img class="shrek-img" src="https://i.pinimg.com/originals/02/6c/5d/026c5dab9176700ffd06beb7db7da674.gif" alt="shrek gif">
    <h1>Welcome to Shrek's Swamp of Fun! <span class="shrek-emoji">💚</span></h1>
    <div class="shrek-quote">
        "Ogres are like onions... they have layers!" <br>– Shrek
    </div>
    <div class="shrek-buttons">
        <button onclick="window.location.href='index.php'">Go to Currency Converter</button>
        <button onclick="window.location.href='evaluate.php'">View Conversion Result</button>
        <button onclick="window.location.href='https://www.shrek.com'">Visit Shrek's Official Site</button>
        <button onclick="window.location.href='https://www.youtube.com/watch?v=CwXOrWvPBPk'">All Star by Smash Mouth</button>
    </div>
    <img class="shrek-img" src="https://media.tenor.com/ZssuuMYJR0IAAAAM/shrek-shrek-rizz.gif" alt="shrek rizz gif">
    <div class="shrek-facts">
        <strong>Did you know?</strong>
        <ul>
            <li>Shrek won the first ever Oscar for Best Animated Feature! 🏆</li>
            <li>Shrek's favorite food is waffles (thanks, Donkey)! 🧇</li>
            <li>There are 4 Shrek movies and a musical! 🎬</li>
            <li>Shrek's swamp is the peak of real estate. 🏡</li>
        </ul>
    </div>
    <div class="shrek-audio">
        <audio controls>
            <source src="https://cdn.pixabay.com/audio/2022/07/26/audio_124bfae5b6.mp3" type="audio/mp3">
            Your browser does not support the audio element.
        </audio>
        <div><em>Bonus: Listen to some swampy tunes!</em></div>
    </div>
    <div class="shrek-quote">
        "Somebody once told me the world is gonna roll me..." <br>– Smash Mouth
    </div>
    <img class="shrek-img" src="https://media.tenor.com/9k4v6w4vQwYAAAAC/shrek-dance.gif" alt="shrek dance gif">
</body>
</html>