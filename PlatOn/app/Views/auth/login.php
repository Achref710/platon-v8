<form action="<?php echo BASE_URL; ?>/auth/check" method="POST">
    <div class="mb-3">
        <label class="form-label"><i class="bi bi-envelope"></i> Email Professionnel</label>
        <input type="email" name="email" class="form-control" required 
               placeholder="exemple@platon-restaurant.tn">
        <small class="form-text text-muted">
            Utilisez: chef@platon-restaurant.tn, serveur@platon-restaurant.tn, ou gerant@platon-restaurant.tn
        </small>
    </div>
    
    <div class="mb-3">
        <label class="form-label"><i class="bi bi-key"></i> Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
        <small class="form-text text-muted">
            Mots de passe: chef123, serveur123, gerant123
        </small>
    </div>
    
    <button type="submit" class="btn btn-primary w-100">
        <i class="bi bi-box-arrow-in-right"></i> Se connecter
    </button>
</form>