<?php
session_start();
require __DIR__ . '/includes/functions.php';

$flash = getFlash();
$old = getOldInput();
$errors = getOldErrors();
$token = csrfToken();
$today = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chez Délice — Restaurant à Cotonou</title>
<meta name="description" content="Chez Délice, restaurant de cuisine locale et internationale à Cotonou, Bénin. Consultez le menu et réservez votre table en ligne.">

<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' rx='22' fill='%2316120e'/%3E%3Ctext x='50' y='68' font-size='54' font-family='Georgia,serif' font-weight='700' fill='%23d1a054' text-anchor='middle'%3ECD%3C/text%3E%3C/svg%3E">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Jost:wght@400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">
</head>
<body>

<p class="demo-banner">Projet de démonstration (portfolio) — coordonnées et établissement fictifs.</p>

<header class="header" id="header">
  <div class="container header__inner">
    <a href="#top" class="logo">Chez <span>Délice</span></a>
    <nav class="nav" id="nav">
      <ul class="nav__list">
        <li><a href="#top" data-nav>Accueil</a></li>
        <li><a href="#apropos" data-nav>À propos</a></li>
        <li><a href="#menu" data-nav>Menu</a></li>
        <li><a href="#ambiance" data-nav>Ambiance</a></li>
        <li><a href="#reservation" data-nav>Réservation</a></li>
        <li><a href="#contact" data-nav>Contact</a></li>
      </ul>
    </nav>
    <div class="header__actions">
      <a href="#reservation" class="btn btn--primary btn--sm">Réserver une table</a>
      <button class="nav-toggle" id="navToggle" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="nav">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<div class="nav-overlay" id="navOverlay"></div>

<main id="top">

  <!-- HERO -->
  <section class="hero">
    <div class="hero__pattern" aria-hidden="true"></div>
    <div class="container hero__inner">
      <p class="eyebrow">Restaurant · Cotonou, Bénin</p>
      <h1>Une cuisine qui raconte <span class="text-accent">une histoire</span></h1>
      <p class="hero__desc">
        Chez Délice marie les saveurs locales béninoises et des influences internationales,
        dans un cadre chaleureux pensé pour les grands moments comme pour les envies du quotidien.
      </p>
      <div class="hero__actions">
        <a href="#reservation" class="btn btn--primary">Réserver une table</a>
        <a href="#menu" class="btn btn--ghost">Découvrir le menu</a>
      </div>
    </div>
    <div class="hero__plate" aria-hidden="true">
      <svg viewBox="0 0 200 200" fill="none">
        <circle cx="100" cy="100" r="98" stroke="currentColor" stroke-width="1.5" opacity="0.35"/>
        <circle cx="100" cy="100" r="72" stroke="currentColor" stroke-width="1.5" opacity="0.5"/>
        <path d="M70 60v40a12 12 0 0 0 12 12v28M70 60v24M78 60v24M62 60v24" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
        <path d="M130 60c-8 0-14 10-14 24s6 22 14 26v30" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>
  </section>

  <!-- A PROPOS -->
  <section class="section" id="apropos">
    <div class="container about__grid">
      <div data-reveal>
        <p class="section-tag">À propos</p>
        <h2 class="section-title">Notre histoire</h2>
        <p class="section-text">
          Né d'une passion pour la gastronomie locale, Chez Délice propose une cuisine généreuse,
          préparée avec des produits frais et de saison. Notre équipe s'attache à faire vivre un
          moment convivial à chaque visite, entre plats traditionnels béninois et créations plus
          audacieuses.
        </p>
        <p class="section-text">
          Que ce soit pour un déjeuner rapide, un dîner en famille ou un événement privé,
          notre salle et notre équipe s'adaptent à votre moment.
        </p>
      </div>
      <div class="highlight-grid" data-reveal>
        <div class="highlight-card">
          <span class="highlight-card__num">20+</span>
          <p>plats au menu</p>
        </div>
        <div class="highlight-card">
          <span class="highlight-card__num">7j/7</span>
          <p>ouvert midi et soir</p>
        </div>
        <div class="highlight-card">
          <span class="highlight-card__num">100%</span>
          <p>fait maison</p>
        </div>
        <div class="highlight-card">
          <span class="highlight-card__num">60</span>
          <p>places assises</p>
        </div>
      </div>
    </div>
  </section>

  <!-- MENU -->
  <section class="section section--alt" id="menu">
    <div class="container">
      <p class="section-tag" data-reveal>Notre carte</p>
      <h2 class="section-title" data-reveal>Le Menu</h2>
      <p class="section-sub" data-reveal>Une sélection qui change au fil des saisons. Prix en francs CFA.</p>

      <div class="menu-tabs" data-reveal>
        <button class="menu-tab is-active" data-tab="entrees" type="button">Entrées</button>
        <button class="menu-tab" data-tab="plats" type="button">Plats</button>
        <button class="menu-tab" data-tab="desserts" type="button">Desserts</button>
        <button class="menu-tab" data-tab="boissons" type="button">Boissons</button>
      </div>

      <div class="menu-panel is-active" data-panel="entrees" data-reveal>
        <div class="menu-item">
          <div><h3>Beignets de crevettes épicés</h3><p>Sauce pimentée maison, citron vert</p></div>
          <span class="menu-price">2 000</span>
        </div>
        <div class="menu-item">
          <div><h3>Salade fraîcheur avocat &amp; mangue</h3><p>Vinaigrette au gingembre</p></div>
          <span class="menu-price">1 800</span>
        </div>
        <div class="menu-item">
          <div><h3>Feuilleté de wagasi grillé</h3><p>Fromage local grillé, miel &amp; herbes</p></div>
          <span class="menu-price">2 200</span>
        </div>
      </div>

      <div class="menu-panel" data-panel="plats" data-reveal>
        <div class="menu-item">
          <div><h3>Poulet braisé &amp; alloco</h3><p>Sauce piquante maison, banane plantain</p></div>
          <span class="menu-price">4 500</span>
        </div>
        <div class="menu-item">
          <div><h3>Riz au gras, viande de bœuf</h3><p>Légumes de saison</p></div>
          <span class="menu-price">4 000</span>
        </div>
        <div class="menu-item">
          <div><h3>Amiwo traditionnel</h3><p>Poisson grillé, sauce tomate épicée</p></div>
          <span class="menu-price">4 800</span>
        </div>
        <div class="menu-item">
          <div><h3>Pâte rouge, sauce arachide &amp; poulet</h3><p>Recette traditionnelle</p></div>
          <span class="menu-price">4 200</span>
        </div>
        <div class="menu-item">
          <div><h3>Pizza margherita maison</h3><p>Pâte artisanale, basilic frais</p></div>
          <span class="menu-price">5 000</span>
        </div>
      </div>

      <div class="menu-panel" data-panel="desserts" data-reveal>
        <div class="menu-item">
          <div><h3>Beignets sucrés &amp; miel</h3><p>Recette traditionnelle</p></div>
          <span class="menu-price">1 500</span>
        </div>
        <div class="menu-item">
          <div><h3>Salade de fruits tropicaux</h3><p>Ananas, mangue, papaye</p></div>
          <span class="menu-price">1 700</span>
        </div>
        <div class="menu-item">
          <div><h3>Fondant au chocolat</h3><p>Cœur coulant, glace vanille</p></div>
          <span class="menu-price">2 000</span>
        </div>
      </div>

      <div class="menu-panel" data-panel="boissons" data-reveal>
        <div class="menu-item">
          <div><h3>Bissap glacé maison</h3><p>Hibiscus, menthe fraîche</p></div>
          <span class="menu-price">1 000</span>
        </div>
        <div class="menu-item">
          <div><h3>Jus de gingembre</h3><p>Fait maison</p></div>
          <span class="menu-price">1 000</span>
        </div>
        <div class="menu-item">
          <div><h3>Eau minérale</h3><p>50cl</p></div>
          <span class="menu-price">500</span>
        </div>
        <div class="menu-item">
          <div><h3>Sélection de vins</h3><p>Sur demande auprès de notre équipe</p></div>
          <span class="menu-price">—</span>
        </div>
      </div>
    </div>
  </section>

  <!-- AMBIANCE -->
  <section class="section" id="ambiance">
    <div class="container">
      <p class="section-tag" data-reveal>Pourquoi nous choisir</p>
      <h2 class="section-title" data-reveal>L'expérience Chez Délice</h2>

      <div class="feature-grid">
        <div class="feature-card" data-reveal>
          <div class="feature-card__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <h3>Cadre chaleureux</h3>
          <p>Une salle pensée pour les moments en famille, entre amis ou en tête-à-tête.</p>
        </div>
        <div class="feature-card" data-reveal>
          <div class="feature-card__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 2v20M4 6c0 6 4 8 8 8s8-2 8-8"/></svg>
          </div>
          <h3>Ingrédients frais</h3>
          <p>Des produits locaux sélectionnés chaque semaine auprès de nos producteurs.</p>
        </div>
        <div class="feature-card" data-reveal>
          <div class="feature-card__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="m3 11 18-5-5 18-4-8-8-4Z"/></svg>
          </div>
          <h3>Recettes locales</h3>
          <p>Des classiques béninois revisités, aux côtés de créations plus audacieuses.</p>
        </div>
        <div class="feature-card" data-reveal>
          <div class="feature-card__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2M10 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h3>Service attentionné</h3>
          <p>Une équipe présente pour rendre chaque visite mémorable.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- RESERVATION -->
  <section class="section section--alt" id="reservation">
    <div class="container reservation__grid">
      <div data-reveal>
        <p class="section-tag">Réservation</p>
        <h2 class="section-title">Réservez votre table</h2>
        <p class="section-text">
          Remplissez le formulaire ci-contre : nous confirmons chaque réservation par téléphone
          ou par email dans les meilleurs délais.
        </p>
        <ul class="info-mini">
          <li><strong>Horaires</strong><span>Lun–Ven 11h30–15h &amp; 18h30–22h30 · Sam–Dim 11h–23h</span></li>
          <li><strong>Capacité</strong><span>Jusqu'à 20 personnes par réservation</span></li>
        </ul>
      </div>

      <form class="reservation-form" method="post" action="reserver.php" novalidate>
        <input type="hidden" name="csrf_token" value="<?= e($token) ?>">

        <?php if ($flash): ?>
          <p class="form-alert form-alert--<?= e($flash['type']) ?>"><?= e($flash['message']) ?></p>
        <?php endif; ?>
        <?php if (!empty($errors['global'])): ?>
          <p class="form-alert form-alert--error"><?= e($errors['global']) ?></p>
        <?php endif; ?>

        <div class="form-row">
          <label for="nom">Nom complet</label>
          <input type="text" id="nom" name="nom" value="<?= e($old['nom'] ?? '') ?>" required>
          <?php if (!empty($errors['nom'])): ?><span class="form-error"><?= e($errors['nom']) ?></span><?php endif; ?>
        </div>

        <div class="form-row">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="<?= e($old['email'] ?? '') ?>" required>
          <?php if (!empty($errors['email'])): ?><span class="form-error"><?= e($errors['email']) ?></span><?php endif; ?>
        </div>

        <div class="form-row">
          <label for="telephone">Téléphone</label>
          <input type="tel" id="telephone" name="telephone" value="<?= e($old['telephone'] ?? '') ?>" required>
          <?php if (!empty($errors['telephone'])): ?><span class="form-error"><?= e($errors['telephone']) ?></span><?php endif; ?>
        </div>

        <div class="form-row form-row--split">
          <div>
            <label for="date">Date</label>
            <input type="date" id="date" name="date" min="<?= e($today) ?>" value="<?= e($old['date'] ?? '') ?>" required>
            <?php if (!empty($errors['date'])): ?><span class="form-error"><?= e($errors['date']) ?></span><?php endif; ?>
          </div>
          <div>
            <label for="heure">Heure</label>
            <input type="time" id="heure" name="heure" value="<?= e($old['heure'] ?? '') ?>" required>
            <?php if (!empty($errors['heure'])): ?><span class="form-error"><?= e($errors['heure']) ?></span><?php endif; ?>
          </div>
          <div>
            <label for="personnes">Personnes</label>
            <input type="number" id="personnes" name="personnes" min="1" max="20" value="<?= e($old['personnes'] ?? '2') ?>" required>
            <?php if (!empty($errors['personnes'])): ?><span class="form-error"><?= e($errors['personnes']) ?></span><?php endif; ?>
          </div>
        </div>

        <div class="form-row">
          <label for="message">Demande particulière (optionnel)</label>
          <textarea id="message" name="message" rows="3"><?= e($old['message'] ?? '') ?></textarea>
        </div>

        <button type="submit" class="btn btn--primary btn--block">Envoyer la demande de réservation</button>
      </form>
    </div>
  </section>

  <!-- CONTACT -->
  <section class="section" id="contact">
    <div class="container">
      <p class="section-tag" data-reveal>Contact</p>
      <h2 class="section-title" data-reveal>Nous trouver</h2>

      <div class="contact__grid">
        <div class="contact__info" data-reveal>
          <div class="contact-card">
            <strong>Adresse</strong>
            <span>Quartier Fidjrossè, Cotonou, Bénin <em>(adresse fictive)</em></span>
          </div>
          <div class="contact-card">
            <strong>Téléphone</strong>
            <span><a href="tel:+22900000000">+229 00 00 00 00</a> <em>(numéro fictif)</em></span>
          </div>
          <div class="contact-card">
            <strong>Email</strong>
            <span><a href="mailto:contact@chezdelice.example">contact@chezdelice.example</a> <em>(adresse fictive)</em></span>
          </div>
          <a href="https://wa.me/22900000000" target="_blank" rel="noopener noreferrer" class="btn btn--whatsapp">
            Contacter sur WhatsApp
          </a>
        </div>
        <div class="contact__map" data-reveal>
          <iframe
            src="https://www.google.com/maps?q=Cotonou,B%C3%A9nin&output=embed"
            title="Localisation de Cotonou, Bénin"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </section>

</main>

<footer class="footer">
  <div class="container footer__inner">
    <a href="#top" class="logo">Chez <span>Délice</span></a>
    <p>© <span id="year"></span> Chez Délice — Site vitrine fictif réalisé à des fins de portfolio.</p>
  </div>
</footer>

<button class="back-to-top" id="backToTop" aria-label="Retour en haut">
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m18 15-6-6-6 6"/></svg>
</button>

<script src="js/script.js"></script>
</body>
</html>
