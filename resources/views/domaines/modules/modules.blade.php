<!doctype html>
<html class="no-js" lang="en">
@include('partials.head')

<body>
    @include('partials.sidbar')
    @vite('resources/css/style.css')

    <style>
        :root {
            --primary-color: #0056D2;
            --secondary-color: #1E88E5;
            --light-color: #F5F5F5;
            --text-color: #333;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--light-color);
            color: var(--text-color);
            margin: 0;
        }

        .nav-link {
            color: var(--text-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .sidebar {
            background-color: var(--light-color);
            border-right: 1px solid #e0e0e0;
            position: fixed;
            top: 130px;
            left: 0;
            width: 250px;
            height: calc(100vh - 130px);
            overflow-y: auto; 
            z-index: 1000;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            padding-bottom: 60px; 
        }

        .content {
            margin-top: 20px; 
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <nav class="sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#accueil" onclick="showContent('accueil')">
                                <i class="fas fa-home me-2"></i>Introduction
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#module1" onclick="showContent('module1')">
                                <i class="fas fa-book me-2"></i>Module 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#module2" onclick="showContent('module2')">
                                <i class="fas fa-book me-2"></i>Module 2
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#module3" onclick="showContent('module3')">
                                <i class="fas fa-book me-2"></i>Module 3
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ressources" onclick="showContent('ressources')">
                                <i class="fas fa-file-alt me-2"></i>Ressources
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#forum" onclick="showContent('forum')">
                                <i class="fas fa-comments me-2"></i>Forum
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div id="accueil" class="content">
                    <h1 class="mb-4">Guide de l'IA et de l'AA <small class="text-muted">Traduit de l'anglais</small></h1>
                    <p class="lead">L'intelligence artificielle (IA) et l'apprentissage automatique (ML) sont en train de changer l'avenir du travail...</p>
                </div>

                <div id="module1" class="content" style="display: none;">
                    <h2>Module 1 : Introduction à l'IA</h2>
                    <ul class="list-group">
                        <li class="list-group-item">1.1 Qu'est-ce que l'IA ?</li>
                        <li class="list-group-item">1.2 Histoire de l'IA</li>
                        <li class="list-group-item">1.3 Types d'IA</li>
                        <li class="list-group-item">1.4 Applications de l'IA</li>
                        <li class="list-group-item"><a href="{{ $module1->video_url }}" target="_blank">Voir Vidéo</a></li>
                    </ul>
                </div>

                <div id="module2" class="content" style="display: none;">
                    <h2>Module 2 : Fondamentaux du Machine Learning</h2>
                    <ul class="list-group">
                        <li class="list-group-item">2.1 Introduction au Machine Learning</li>
                        <li class="list-group-item">2.2 Apprentissage supervisé</li>
                        <li class="list-group-item">2.3 Apprentissage non supervisé</li>
                        <li class="list-group-item">2.4 Apprentissage par renforcement</li>
                        <li class="list-group-item"><a href="{{ $module2->video_url }}" target="_blank">Voir Vidéo</a></li>
                    </ul>
                </div>

                <div id="module3" class="content" style="display: none;">
                    <h2>Module 3 : Techniques avancées d'IA</h2>
                    <ul class="list-group">
                        <li class="list-group-item">3.1 Réseaux de neurones</li>
                        <li class="list-group-item">3.2 Deep Learning</li>
                        <li class="list-group-item">3.3 Traitement du langage naturel</li>
                        <li class="list-group-item">3.4 Vision par ordinateur</li>
                        <li class="list-group-item"><a href="{{ $module3->video_url }}" target="_blank">Voir Vidéo</a></li>
                    </ul>
                </div>

                <div id="ressources" class="content" style="display: none;">
                    <h2>Ressources supplémentaires</h2>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Livres recommandés sur l'IA</a></li>
                        <li class="list-group-item"><a href="#">Articles scientifiques récents</a></li>
                        <li class="list-group-item"><a href="#">Outils et frameworks pour l'IA</a></li>
                        <li class="list-group-item"><a href="#">Conférences et événements à venir</a></li>
                    </ul>
                </div>

                <div id="forum" class="content" style="display: none;">
                    <h2>Forum de discussion</h2>
                    <div class="mb-3">
                        <label for="newTopic" class="form-label">Nouveau sujet</label>
                        <input type="text" class="form-control" id="newTopic" placeholder="Entrez le titre de votre sujet">
                    </div>
                    <div class="mb-3">
                        <label for="newMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="newMessage" rows="3" placeholder="Écrivez votre message ici"></textarea>
                    </div>
                    <button class="btn btn-primary">Poster</button>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showContent(contentId) {
            const contents = document.querySelectorAll('.content');
            contents.forEach(content => {
                content.style.display = 'none';
            });
            document.getElementById(contentId).style.display = 'block';

            // Scroller vers le bon module
            const sidebarHeight = document.querySelector('.sidebar').offsetHeight;
            const headerHeight = 130; // hauteur de l'en-tête
            const scrollTo = document.getElementById(contentId).offsetTop - headerHeight;
            window.scrollTo({ top: scrollTo, behavior: 'smooth' });
        }
    </script>

</body>
@include('components.footer')
</html>
