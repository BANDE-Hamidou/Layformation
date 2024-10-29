<html>

<head>
    <base href="https://layformation-dashboard.com/">
    <!-- Bootstrap CSS -->
    <!-- <link href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/formations.css') }}">
    <title>Tableau de bord LAYFORMATION</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            color: #333;
        }

        .container {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        .sidebar {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
        }

        .main-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .nav-item {
            padding: 10px;
            margin: 5px 0;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-item:hover,
        .nav-item.active {
            background-color: #34495e;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            background-color: #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .card-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .stat {
            font-size: 24px;
            font-weight: bold;
            color: #3498db;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .content {
            flex-grow: 1;
            display: none;
        }

        .content.active {
            display: block;
        }

        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">LAYFORMATION</div>

            <div class="nav-item" data-target="dashboard">
                <a href="{{ route('dashboard') }}" style="color: inherit; text-decoration: none;">Tableau de bord</a>
            </div>

            <div class="nav-item" data-target="courses">
                <a href="{{ route('formations.index') }}" style="color: inherit; text-decoration: none;">Cours</a>
            </div>

            <div class="nav-item" data-target="modules">
                <a href="{{ route('modules.index') }}" style="color: inherit; text-decoration: none;">Modules</a>
            </div>

            <div class="nav-item" data-target="students">
                <a href="{{ route('etudiants.index') }}" style="color: inherit; text-decoration: none;">Étudiants</a>
            </div>

            <div class="nav-item" data-target="trainers">
                <a href="{{ route('formateurs.index') }}" style="color: inherit; text-decoration: none;">Formateurs</a>
            </div>

            <div class="nav-item" data-target="reports">
                <a href="{{ route('domaines.index') }}" style="color: inherit; text-decoration: none;">Domaines</a>
            </div>

            <!-- Ajout des boutons pour les Quiz et les Chapitres & Ressources -->
            <div class="nav-item" data-target="chapitres">
                <a href="{{ route('chapitres.index') }}" style="color: inherit; text-decoration: none;">Chapitres</a>
            </div>

            <div class="nav-item" data-target="resources">
                <a href="{{ route('resources.index') }}" style="color: inherit; text-decoration: none;">Ressources</a>
            </div>

            <div class="nav-item" data-target="quiz">
                <a href="{{ route('quizzes.index') }}" style="color: inherit; text-decoration: none;">Quiz</a>
            </div>

        </div>

        <div class="main-content">
            <div class="header">
                <h1>LAYFORMATION</h1>
                <div class="user-info">
                    <div class="user-avatar">H</div>
                    <span>Haidara</span>
                </div>
            </div>

            <div id="dashboard" class="content active">
                <div class="dashboard-grid">
                    @yield('content')
                </div>
            </div>

            <footer>
                <p>&copy; 2023 LAYFORMATION. Tous droits réservés.</p>
            </footer>
        </div>
    </div>

    <script>
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function() {
                const target = this.getAttribute('data-target');
                document.querySelectorAll('.content').forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById(target).classList.add('active');
                document.querySelectorAll('.nav-item').forEach(navItem => {
                    navItem.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    </script>
</body>

</html>
