<!doctype html>
<html class="no-js" lang="en">

@include('partials.head')

<body>
    <!--header-top start -->
    @include('partials.sidbar')
    @vite('resources/css/styles.css')

    <div class="form-container">
        <h2>Formulaire d'inscription d'Étudiant</h2>
        <form id="student-form" action="{{ route('etudiants.store') }}" method="post">
            @csrf

            <label for="id">IDENTIFIANT:</label>
            <input type="number" id="id" name="id" min="1" required>

            <label for="nom">Nom Complet:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="sexe">Sexe:</label>
            <div>
                <input type="radio" id="M" name="sexe" value="M" required>
                <label for="M">M</label>
                <input type="radio" id="F" name="sexe" value="F" required>
                <label for="F">Femme</label>
            </div>

            <label for="age">Âge:</label>
            <input type="number" id="age" name="age" min="16" max="100" required>

            <label for="formation">Sélectionnez votre formation:</label>
            <select id="formation" name="formation" required>
                <option value="">--Sélectionnez une formation--</option>
                <optgroup label="Informatique">
                    <option value="programmation">Programmation</option>
                    <option value="produits-office">Formation sur les produits Office</option>
                    <option value="maintenance">Maintenance Informatique</option>
                </optgroup>
                <optgroup label="Énergie et Environnement">
                    <option value="energie-renouvelable">Énergie Renouvelable</option>
                    <option value="gestion-dechets">Gestion des Déchets</option>
                </optgroup>
                <optgroup label="Santé et Services Sociaux">
                    <option value="secourisme">Secourisme</option>
                    <option value="assistance-sociale">Assistance Sociale</option>
                </optgroup>
                <optgroup label="Plomberie">
                    <option value="installation-sanitaire">Installation Sanitaire</option>
                    <option value="entretien">Entretien de Systèmes</option>
                </optgroup>
                <optgroup label="Logistique et Transport">
                    <option value="gestion-stock">Gestion de Stock</option>
                    <option value="transport-routier">Transport Routier</option>
                </optgroup>
                <optgroup label="Art et Design">
                    <option value="design-graphique">Design Graphique</option>
                    <option value="peinture">Peinture</option>
                </optgroup>
                <optgroup label="Marketing Digital">
                    <option value="seo">SEO (Référencement)</option>
                    <option value="reseaux-sociaux">Marketing sur les Réseaux Sociaux</option>
                </optgroup>
                <optgroup label="Couture et Esthétique">
                    <option value="couture">Couture</option>
                    <option value="soins-beaute">Soins de Beauté</option>
                </optgroup>
                <optgroup label="Langues, Communication et Ingénierie">
                    <option value="anglais">Anglais</option>
                    <option value="arabe">Arabe</option>
                    <option value="mooree">Mooré</option>
                    <option value="fulfulde">Fulfuldé</option>
                    <option value="tamashek">Tamashek</option>
                    <option value="bissa">Bissa</option>
                    <option value="chinois">Chinois</option>
                    <option value="francais">Français</option>
                </optgroup>
            </select>

            <label for="mode">Mode de formation:</label>
            <div>
                <label for="en-ligne">En ligne</label>
                <input type="radio" id="en-ligne" name="mode" value="en-ligne" required>
                <label for="presentiel">Présentiel</label>
                <input type="radio" id="presentiel" name="mode" value="presentiel" required>
            </div>

            <label for="ville">Ville de Résidence:</label>
            <select id="ville" name="ville" required>
                <option value="">--Sélectionnez une ville--</option>
                <option value="ouagadougou">Ouagadougou</option>
                <option value="bobo-dioulasso">Bobo-Dioulasso</option>
                <option value="koudougou">Koudougou</option>
                <option value="ouahigouya">Ouahigouya</option>
                <option value="fada-ngourma">Fada N'gourma</option>
                <option value="djibo">Djibo</option>
                <option value="tenkodogo">Tenkodogo</option>
                <option value="dori">Dori</option>
                <option value="po">Po</option>
                <option value="banfora">Banfora</option>
                <option value="ziniaré">Ziniaré</option>
                <option value="leo">Léo</option>
                <option value="titao">Titao</option>
                <option value="kaya">Kaya</option>
                <option value="aribinda">Aribinda</option>
                <option value="segou">Ségou</option>
            </select>

            <button type="submit">S'inscrire</button>
        </form>

        <div id="message" class="alert alert-info mt-3" style="display:none;"></div> <!-- Message d'information -->
    </div>

    @include('components.footer')

    <script>
    document.getElementById('student-form').addEventListener('submit', function(event) {
        var mode = document.querySelector('input[name="mode"]:checked').value;

        if (mode === 'en-ligne') {
            // Redirige vers une autre page
            window.location.href = "{{ route('etudiants.index') }}"; // Remplacez par votre route
        } else if (mode === 'presentiel') {
            // Affiche un message
            var messageDiv = document.getElementById('message');
            messageDiv.innerHTML = "Nous vous contacterons par email dans un délai de 24 heures.";
            messageDiv.style.display = "block";
        }
    });
    </script>
</body>
</html>
