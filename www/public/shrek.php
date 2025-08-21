<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🧅 PEAK SHREK SUPREMACY - THE ULTIMATE SWAMP EXPERIENCE 🧅</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Creepster&family=Fredoka+One:wght@400&display=swap');
        
        * {
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(45deg, #2d5016 0%, #4a7c59 25%, #6ab04c 50%, #badc58 75%, #f9ca24 100%);
            background-size: 400% 400%;
            animation: swamp-waves 8s ease-in-out infinite;
            font-family: 'Fredoka One', 'Comic Sans MS', cursive;
            color: #1e3a0f;
            text-align: center;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            min-height: 100vh;
            position: relative;
        }
        
        @keyframes swamp-waves {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        /* Floating onions background */
        body::before {
            content: '🧅 🧅 🧅 🧅 🧅 🧅 🧅 🧅 🧅 🧅';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            font-size: 2em;
            opacity: 0.1;
            animation: float-onions 20s linear infinite;
            pointer-events: none;
            z-index: -1;
        }
        
        @keyframes float-onions {
            0% { transform: translateY(100vh) rotate(0deg); }
            100% { transform: translateY(-100vh) rotate(360deg); }
        }
        
        .shrek-container {
            position: relative;
            z-index: 1;
            padding: 20px;
        }
        
        h1 {
            font-family: 'Creepster', cursive;
            font-size: clamp(2em, 8vw, 5em);
            margin: 20px 0;
            text-shadow: 
                0 0 10px #badc58,
                0 0 20px #6ab04c,
                0 0 30px #4a7c59,
                0 0 40px #2d5016,
                2px 2px 0px #000;
            letter-spacing: 3px;
            animation: mega-shrek-glow 3s infinite alternate;
            background: linear-gradient(45deg, #6ab04c, #badc58, #f9ca24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        @keyframes mega-shrek-glow {
            0% { 
                transform: scale(1) rotate(-1deg);
                filter: hue-rotate(0deg);
            }
            50% { 
                transform: scale(1.05) rotate(1deg);
                filter: hue-rotate(90deg);
            }
            100% { 
                transform: scale(1.1) rotate(-1deg);
                filter: hue-rotate(180deg);
            }
        }
        
        .shrek-quote {
            font-size: clamp(1.2em, 4vw, 2em);
            margin: 30px auto;
            color: #1e3a0f;
            font-style: italic;
            background: linear-gradient(135deg, #dff9b3, #badc58, #f9ca24);
            border-radius: 25px;
            display: inline-block;
            padding: 20px 40px;
            box-shadow: 
                0 8px 32px rgba(106, 176, 76, 0.4),
                inset 0 2px 0 rgba(255,255,255,0.3);
            border: 3px solid #6ab04c;
            position: relative;
            animation: quote-pulse 4s infinite;
            max-width: 90%;
        }
        
        .shrek-quote::before {
            content: '🧅';
            position: absolute;
            left: -15px;
            top: -15px;
            font-size: 2em;
            animation: spin-onion 3s linear infinite;
        }
        
        .shrek-quote::after {
            content: '💚';
            position: absolute;
            right: -15px;
            bottom: -15px;
            font-size: 2em;
            animation: heartbeat 2s infinite;
        }
        
        @keyframes quote-pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }
        
        @keyframes spin-onion {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.3); }
        }
        
        .shrek-img {
            border-radius: 30px;
            margin: 30px 0;
            box-shadow: 
                0 15px 35px rgba(0,0,0,0.3),
                0 5px 15px rgba(106, 176, 76, 0.4);
            max-width: 90vw;
            border: 8px solid #6ab04c;
            background: linear-gradient(45deg, #badc58, #f9ca24);
            padding: 10px;
            animation: img-float 6s ease-in-out infinite;
            transition: transform 0.3s ease;
        }
        
        .shrek-img:hover {
            transform: scale(1.05) rotate(2deg);
            box-shadow: 
                0 20px 50px rgba(0,0,0,0.4),
                0 10px 25px rgba(106, 176, 76, 0.6);
        }
        
        @keyframes img-float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .shrek-buttons {
            margin: 40px 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        
        button {
            background: linear-gradient(135deg, #6ab04c, #4a7c59);
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 18px 35px;
            font-size: clamp(1em, 3vw, 1.3em);
            cursor: pointer;
            box-shadow: 
                0 8px 25px rgba(0,0,0,0.2),
                inset 0 2px 0 rgba(255,255,255,0.2);
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            font-family: inherit;
            font-weight: bold;
            border: 3px solid #2d5016;
            position: relative;
            overflow: hidden;
        }
        
        button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        button:hover::before {
            left: 100%;
        }
        
        button:hover {
            background: linear-gradient(135deg, #4a7c59, #2d5016);
            transform: scale(1.1) rotate(-3deg);
            box-shadow: 
                0 15px 35px rgba(0,0,0,0.3),
                inset 0 2px 0 rgba(255,255,255,0.3);
        }
        
        button:active {
            transform: scale(0.95) rotate(1deg);
        }
        
        .shrek-emoji {
            font-size: clamp(2em, 6vw, 4em);
            margin: 0 15px;
            vertical-align: middle;
            animation: mega-bounce 2s infinite alternate;
            display: inline-block;
        }
        
        @keyframes mega-bounce {
            0% { transform: translateY(0) rotate(-10deg) scale(1); }
            100% { transform: translateY(-25px) rotate(10deg) scale(1.2); }
        }
        
        .shrek-marquee {
            width: 100vw;
            background: linear-gradient(90deg, #2d5016, #4a7c59, #6ab04c, #4a7c59, #2d5016);
            background-size: 200% 100%;
            animation: marquee-gradient 4s linear infinite;
            color: #fff;
            font-size: clamp(1em, 4vw, 1.8em);
            padding: 15px 0;
            font-weight: bold;
            letter-spacing: 3px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            position: relative;
            overflow: hidden;
        }
        
        @keyframes marquee-gradient {
            0% { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }
        
        .shrek-facts {
            background: linear-gradient(135deg, #dff9b3, #badc58);
            border-radius: 25px;
            display: inline-block;
            padding: 25px 40px;
            margin: 30px 0;
            box-shadow: 
                0 15px 35px rgba(106, 176, 76, 0.3),
                inset 0 2px 0 rgba(255,255,255,0.3);
            text-align: left;
            max-width: 600px;
            border: 4px solid #6ab04c;
            position: relative;
            animation: facts-glow 5s infinite alternate;
        }
        
        @keyframes facts-glow {
            0% { box-shadow: 0 15px 35px rgba(106, 176, 76, 0.3), inset 0 2px 0 rgba(255,255,255,0.3); }
            100% { box-shadow: 0 20px 50px rgba(106, 176, 76, 0.5), inset 0 2px 0 rgba(255,255,255,0.5); }
        }
        
        .shrek-facts ul {
            padding-left: 30px;
            font-size: clamp(1em, 3vw, 1.2em);
            line-height: 1.6;
        }
        
        .shrek-facts li {
            margin: 10px 0;
            position: relative;
        }
        
        .shrek-facts li::marker {
            content: '🧅 ';
        }
        
        .shrek-audio {
            margin: 40px 0;
            background: linear-gradient(135deg, #dff9b3, #badc58);
            border-radius: 20px;
            padding: 25px;
            display: inline-block;
            box-shadow: 0 10px 30px rgba(106, 176, 76, 0.3);
            border: 3px solid #6ab04c;
        }
        
        audio {
            border-radius: 15px;
            filter: sepia(1) hue-rotate(90deg) saturate(2);
        }
        
        .layer-counter {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(106, 176, 76, 0.9);
            color: white;
            padding: 15px;
            border-radius: 15px;
            font-size: 1.2em;
            font-weight: bold;
            z-index: 1000;
            animation: counter-pulse 3s infinite;
        }
        
        @keyframes counter-pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .swamp-creatures {
            position: fixed;
            bottom: 20px;
            left: 20px;
            font-size: 2em;
            animation: creatures-dance 4s infinite;
            z-index: 1000;
        }
        
        @keyframes creatures-dance {
            0%, 100% { transform: translateX(0) rotate(0deg); }
            25% { transform: translateX(10px) rotate(5deg); }
            50% { transform: translateX(-5px) rotate(-3deg); }
            75% { transform: translateX(8px) rotate(2deg); }
        }
        
        .donkey-quote {
            background: linear-gradient(135deg, #8b4513, #daa520);
            color: white;
            border-radius: 20px;
            padding: 20px 30px;
            margin: 20px auto;
            display: inline-block;
            font-style: italic;
            font-size: 1.3em;
            box-shadow: 0 8px 25px rgba(139, 69, 19, 0.4);
            border: 3px solid #654321;
            max-width: 90%;
        }
        
        .fiona-quote {
            background: linear-gradient(135deg, #ff69b4, #ffc0cb);
            color: #8b008b;
            border-radius: 20px;
            padding: 20px 30px;
            margin: 20px auto;
            display: inline-block;
            font-style: italic;
            font-size: 1.3em;
            box-shadow: 0 8px 25px rgba(255, 105, 180, 0.4);
            border: 3px solid #ff1493;
            max-width: 90%;
        }
        
        @media (max-width: 768px) {
            .shrek-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            button {
                width: 90%;
                max-width: 300px;
            }
            
            .layer-counter {
                position: relative;
                margin: 20px auto;
                display: block;
                width: fit-content;
            }
            
            .swamp-creatures {
                position: relative;
                text-align: center;
                margin: 20px 0;
            }
        }
    </style>
</head>
<body>
    <div class="layer-counter">
        🧅 Onion Layers: <span id="layerCount">∞</span> 🧅
    </div>
    
    <div class="swamp-creatures">
        🐸🦎🐍🕷️🦗
    </div>
    
    <div class="shrek-container">
        <div class="shrek-marquee">
            <span class="shrek-emoji">🧅</span>
            WELCOME TO THE ULTIMATE SHREK DIMENSION
            <span class="shrek-emoji">💚</span>
            WHERE DREAMS COME TRUE AND ONIONS HAVE INFINITE LAYERS
            <span class="shrek-emoji">🧅</span>
            SOMEBODY ONCE TOLD ME THE WORLD IS GONNA ROLL ME
            <span class="shrek-emoji">🎵</span>
        </div>
        
        <img class="shrek-img" src="https://i.pinimg.com/originals/02/6c/5d/026c5dab9176700ffd06beb7db7da674.gif" alt="shrek gif">
        
        <h1>🧅 SHREK'S LEGENDARY SWAMP PALACE 🧅</h1>
        
        <div class="shrek-quote">
            "Better out than in, I always say!" <br>– The Almighty Shrek
        </div>
        
        <div class="donkey-quote">
            "I like that boulder. That is a NICE boulder!" <br>– Donkey, the Wise
        </div>
        
        <div class="shrek-buttons">
            <button onclick="window.location.href='index.php'">🧅 Enter the Onion Converter 🧅</button>
            <button onclick="window.location.href='evaluate.php'">💚 View Swamp Results 💚</button>
            <button onclick="window.location.href='https://www.shrek.com'">🏰 Visit Shrek's Royal Domain 🏰</button>
            <button onclick="window.location.href='https://youtu.be/L_jWHffIx5E?feature=shared'">🎵 All Star Anthem 🎵</button>
            <button onclick="alert('You are now 127% more Shrek!')">🌟 Become Peak Shrek 🌟</button>
        </div>
        
        <img class="shrek-img" src="https://media.tenor.com/ZssuuMYJR0IAAAAM/shrek-shrek-rizz.gif" alt="shrek rizz gif">
        
        <div class="fiona-quote">
            "I'd like to know that person better!" <br>– Princess Fiona
        </div>
        
        <div class="shrek-facts">
            <strong>🧅 ULTIMATE SHREK WISDOM 🧅</strong>
            <ul>
                <li>Shrek revolutionized animation and won the first Oscar for Best Animated Feature! 🏆✨</li>
                <li>The swamp is actually a 5-star luxury resort in disguise! 🏡🌟</li>
                <li>Donkey's waffles are scientifically proven to be the best in Far Far Away! 🧇🔬</li>
                <li>There are infinite Shrek movies in parallel dimensions! 🎬🌌</li>
                <li>Shrek's roar can be heard from 3 kingdoms away! 🦁📢</li>
                <li>The onion metaphor has inspired philosophers worldwide! 🧅🧠</li>
                <li>Puss in Boots learned his cute eyes technique from Shrek! 😻👀</li>
                <li>Far Far Away's economy runs entirely on Shrek merchandise! 💰🛍️</li>
            </ul>
        </div>
        
        <div class="shrek-audio">
            <audio controls>
                <source src="music/Smash Mouth - All Star (Official Music Video).mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
            <div><em>🎵 Premium Swamp Soundtrack - Now with 200% more layers! 🎵</em></div>
        </div>
        
        <div class="shrek-quote">
            "I'm not a smart man, but I know what love is... and it's LAYERS!" <br>– Shrek (probably)
        </div>
        
        <div class="donkey-quote">
            "Are we there yet? Are we there yet? Can I stay up and watch the stars?" <br>– Donkey's Eternal Questions
        </div>
        
        <img class="shrek-img" src="https://media.tenor.com/9k4v6w4vQwYAAAAC/shrek-dance.gif" alt="shrek dance gif">
        
        <div class="shrek-quote">
            "This is the part where you run away!" <br>– But nobody ever runs from peak Shrek content
        </div>
        
        <div class="fiona-quote">
            "Who could ever learn to love a hideous, ugly beast?" <br>– Everyone, because Shrek is beautiful inside and out! 💚
        </div>
    </div>
    
    <script>
        // Layer counter animation
        let layerCount = 1;
        setInterval(() => {
            layerCount = (layerCount % 999) + 1;
            document.getElementById('layerCount').textContent = layerCount;
        }, 100);
        
        // Random Shrek quotes popup
        const shrekQuotes = [
            "Ogres are like onions!",
            "Better out than in!",
            "What are you doing in my swamp?!",
            "I like that boulder!",
            "Parfait! Everybody loves parfait!",
            "Donkey!",
            "I'm not a smart man, but I know what love is!"
        ];
        
        setInterval(() => {
            if (Math.random() < 0.1) { // 10% chance every 3 seconds
                const randomQuote = shrekQuotes[Math.floor(Math.random() * shrekQuotes.length)];
                const popup = document.createElement('div');
                popup.style.cssText = `
                    position: fixed;
                    top: ${Math.random() * 50 + 10}%;
                    left: ${Math.random() * 50 + 10}%;
                    background: linear-gradient(135deg, #6ab04c, #badc58);
                    color: white;
                    padding: 10px 20px;
                    border-radius: 15px;
                    font-size: 1.2em;
                    font-weight: bold;
                    z-index: 9999;
                    animation: fadeInOut 3s ease-in-out;
                    pointer-events: none;
                    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
                `;
                popup.textContent = `🧅 ${randomQuote} 🧅`;
                document.body.appendChild(popup);
                
                setTimeout(() => {
                    document.body.removeChild(popup);
                }, 3000);
            }
        }, 3000);
        
        // Add CSS for popup animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeInOut {
                0% { opacity: 0; transform: scale(0.5) rotate(-10deg); }
                50% { opacity: 1; transform: scale(1) rotate(0deg); }
                100% { opacity: 0; transform: scale(0.5) rotate(10deg); }
            }
        `;
        document.head.appendChild(style);
    </script>
            <iframe width="889" height="500" class="youtubeembedvideo" src="https://www.youtube.com/embed/L_jWHffIx5E?si=Ub6WjEjdJIqNe5ra?rel=0&autoplay=1&mute=0" title="YouTube video player" frameborder="0" allow="autoplay; accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</body>
</html>
