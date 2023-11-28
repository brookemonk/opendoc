<div class="card" onclick="openStage()">
    <div class="column1_search">
        <?php if(!is_null($stage) && array_key_exists('nom_entreprise', $stage)): ?>
            <h2><?= htmlspecialchars($stage['nom_entreprise']); ?></h2>
        <?php endif; ?>
        <h4><?= htmlspecialchars($stage['ville_offre']); ?>   </h4>
        <p> <?= htmlspecialchars($stage['nom_promo']); ?> | <?= htmlspecialchars($stage['duree_stage']); ?> semaines</p>
    </div>
    
    <div class="column2_search">
        <h2><?= htmlspecialchars($stage['nom_offre']); ?> </h2>
        <p> <?= htmlspecialchars($stage['description_offre']); ?>     </p>
    </div>
</div>