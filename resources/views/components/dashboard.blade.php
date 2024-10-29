<html>
    <head>
    <base href="https://layformation-dashboard.com/">
    <title>Tableau de bord LAYFORMATION</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body, html {
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
        .nav-item:hover, .nav-item.active {
            background-color: #34495e;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
        th, td {
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

            <div class="nav-item" data-target="reports">
                <a href="{{ route('modules.index') }}" style="color: inherit; text-decoration: none;">Modules</a>
            </div>

            <div class="nav-item" data-target="reports">
                <a href="{{ route('chapitres.index') }}" style="color: inherit; text-decoration: none;">Chapitres</a>
            </div>

            <div class="nav-item" data-target="reports">
                <a href="{{ route('quizzes.index') }}" style="color: inherit; text-decoration: none;">Quiz</a>
            </div>

           {{-- <div class="nav-item" data-target="settings">
                <a href="{{ route('settings.index') }}" style="color: inherit; text-decoration: none;">Paramètres</a>
            </div>  --}}
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
                    <div class="card">
                        <div class="card-header">Étudiants inscrits</div>
                        <div class="stat">1,234</div>
                        <canvas id="studentsChart"></canvas>
                    </div>
                    <div class="card">
                        <div class="card-header">Cours actifs</div>
                        <div class="stat">42</div>
                        <canvas id="coursesChart"></canvas>
                    </div>
                    <div class="card">
                        <div class="card-header">Taux de complétion</div>
                        <div class="stat">78%</div>
                        <canvas id="completionChart"></canvas>
                    </div>
                    <div class="card">
                        <div class="card-header">Revenus mensuels</div>
                        <div class="stat">15,680 €</div>
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Cours les plus populaires</div>
                    <table>
                        <thead>
                            <tr>
                                <th>Titre du cours</th>
                                <th>Formateur</th>
                                <th>Étudiants</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Introduction au Machine Learning</td>
                                <td>Dr. Alice Dubois</td>
                                <td>256</td>
                                <td>4.8/5</td>
                            </tr>
                            <tr>
                                <td>Développement Web Full-Stack</td>
                                <td>Jean Dupont</td>
                                <td>189</td>
                                <td>4.7/5</td>
                            </tr>
                            <tr>
                                <td>Data Science pour débutants</td>
                                <td>Marie Leclerc</td>
                                <td>178</td>
                                <td>4.9/5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="modules" class="content">
    <h2>Gestion des Modules</h2>
    <p>Gérez les modules associés aux cours.</p>
    <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Ajouter un Nouveau Module</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Vidéo</th>
                <th>Formation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
            <tr>
                <td>{{ $module->title }}</td>
                <td>{{ $module->description }}</td>
                <td><a href="{{ $module->video_url }}" target="_blank">Voir Vidéo</a></td>
                <td>{{ $module->name }}</td>
                <td>
                    <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

            {{-- <div id="courses" class="content">
                <h2>Gestion des Cours</h2>
                <p>Ici, vous pouvez gérer tous les cours de la plateforme LAYFORMATION.</p> --}}
                <!-- Ajoutez ici le contenu pour la gestion des cours -->
            {{-- </div> --}}

            <div id="students" class="content">
                <h2>Gestion des Étudiants</h2>
                <p>Gérez les inscriptions, les progrès et les informations des étudiants.</p>
                <!-- Ajoutez ici le contenu pour la gestion des étudiants -->
            </div>

            <div id="trainers" class="content">
                <h2>Gestion des Formateurs</h2>
                <p>Supervisez les formateurs, leurs cours et leurs performances.</p>
                <!-- Ajoutez ici le contenu pour la gestion des formateurs -->
            </div>

            <div id="reports" class="content">
                <h2>Rapports et Analyses</h2>
                <p>Accédez aux statistiques détaillées et aux rapports de performance.</p>
                <!-- Ajoutez ici le contenu pour les rapports -->
            </div>

            <div id="settings" class="content">
                <h2>Paramètres de la Plateforme</h2>
                <p>Configurez les paramètres généraux de LAYFORMATION.</p>
                <!-- Ajoutez ici le contenu pour les paramètres -->
            </div>

            <footer>
                <p>&copy; 2023 LAYFORMATION. Tous droits réservés.</p>
            </footer>
        </div>
    </div>

    <script>
        // Code pour les graphiques (inchangé)
        // ... (le même code que précédemment pour les graphiques)

        // Gestion de la navigation
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

        // Graphique des étudiants inscrits
        new Chart(document.getElementById('studentsChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Étudiants inscrits',
                    data: [800, 950, 1000, 1100, 1150, 1234],
                    borderColor: '#3498db',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Graphique des cours actifs
        new Chart(document.getElementById('coursesChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Cours actifs',
                    data: [30, 34, 37, 39, 41, 42],
                    backgroundColor: '#2ecc71'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Graphique du taux de complétion
        new Chart(document.getElementById('completionChart'), {
            type: 'doughnut',
            data: {
                labels: ['Complété', 'En cours'],
                datasets: [{
                    data: [78, 22],
                    backgroundColor: ['#f39c12', '#e74c3c']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Graphique des revenus mensuels
        new Chart(document.getElementById('revenueChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Revenus (€)',
                    data: [10000, 11500, 12800, 13900, 14700, 15680],
                    borderColor: '#9b59b6',
                    tension: 0.1,
                    fill: true,
                    backgroundColor: 'rgba(155, 89, 182, 0.2)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body></html>
