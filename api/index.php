<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #0a0e27 0%, #1a1f3a 100%);
            color: #e0e0e0;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: rgba(100, 200, 255, 0.5);
            border-radius: 50%;
            animation: float 20s infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(50px); opacity: 0; }
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        header {
            text-align: center;
            margin-bottom: 60px;
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 3.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
            letter-spacing: -1px;
        }

        .subtitle {
            font-size: 1.2rem;
            color: #a0a0a0;
            font-weight: 300;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease-out backwards;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(102, 126, 234, 0.5);
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.2);
        }

        .card:hover::before {
            opacity: 1;
        }

        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.2s; }
        .card:nth-child(3) { animation-delay: 0.3s; }
        .card:nth-child(4) { animation-delay: 0.4s; }
        .card:nth-child(5) { animation-delay: 0.5s; }
        .card:nth-child(6) { animation-delay: 0.6s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-content {
            position: relative;
            z-index: 1;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .card h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .card p {
            color: #b0b0b0;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .stats {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .stat {
            flex: 1;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #808080;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .status-indicator {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 8px;
            animation: pulse 2s infinite;
        }

        .status-online {
            background: #00ff88;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .tech-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .tech-badge {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .tech-badge:hover {
            background: rgba(102, 126, 234, 0.2);
            border-color: rgba(102, 126, 234, 0.5);
        }

        footer {
            text-align: center;
            margin-top: 60px;
            padding: 30px;
            color: #606060;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .stats {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>

    <div class="container">
        <header>
            <h1>Tech Dashboard</h1>
            <p class="subtitle">Modern PHP Application</p>
        </header>

        <div class="grid">
            <div class="card">
                <div class="card-content">
                    <div class="card-icon">🚀</div>
                    <h2>System Status</h2>
                    <p>
                        <span class="status-indicator status-online"></span>
                        All systems operational
                    </p>
                    <div class="stats">
                        <div class="stat">
                            <div class="stat-value"><?php echo phpversion(); ?></div>
                            <div class="stat-label">PHP Version</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value">99.9%</div>
                            <div class="stat-label">Uptime</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-icon">📊</div>
                    <h2>Performance Metrics</h2>
                    <p>Real-time monitoring and analytics</p>
                    <div class="stats">
                        <div class="stat">
                            <div class="stat-value"><?php echo round(memory_get_usage() / 1024 / 1024, 2); ?>MB</div>
                            <div class="stat-label">Memory</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value"><?php echo date('H:i'); ?></div>
                            <div class="stat-label">Server Time</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-icon">🔧</div>
                    <h2>Server Info</h2>
                    <p><?php echo php_uname('s') . ' ' . php_uname('r'); ?></p>
                    <div class="stats">
                        <div class="stat">
                            <div class="stat-value"><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></div>
                            <div class="stat-label">Web Server</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-icon">💻</div>
                    <h2>Tech Stack</h2>
                    <p>Powered by modern technologies</p>
                    <div class="tech-grid">
                        <div class="tech-badge">PHP</div>
                        <div class="tech-badge">HTML5</div>
                        <div class="tech-badge">CSS3</div>
                        <div class="tech-badge">JS</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-icon">🌐</div>
                    <h2>Request Info</h2>
                    <p>Current session details</p>
                    <div class="stats">
                        <div class="stat">
                            <div class="stat-value"><?php echo $_SERVER['REQUEST_METHOD'] ?? 'GET'; ?></div>
                            <div class="stat-label">Method</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value"><?php echo date('Y-m-d'); ?></div>
                            <div class="stat-label">Date</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-icon">⚡</div>
                    <h2>Quick Actions</h2>
                    <p>Manage your application efficiently</p>
                    <button class="btn" onclick="alert('Feature coming soon!')">Get Started</button>
                </div>
            </div>
        </div>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> Tech Dashboard. Built with PHP <?php echo phpversion(); ?></p>
        </footer>
    </div>

    <script>
        // Create floating particles
        const particlesContainer = document.getElementById('particles');
        for (let i = 0; i < 50; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 20 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 15) + 's';
            particlesContainer.appendChild(particle);
        }
    </script>
</body>
</html>
