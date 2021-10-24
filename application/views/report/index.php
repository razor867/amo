<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link active" id="lent" href="#">Lent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="broken" href="#">Broken</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="lost" href="#">Lost</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="repair" href="#">Repair</a>
                    </li>
                </ul>
            </div>
            <div id="lent_card" class="card-body d-block">
                <h5 class="card-title">Lent Asset</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <div id="broken_card" class="card-body d-none">
                <h5 class="card-title">Broken Asset</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <div id="lost_card" class="card-body d-none">
                <h5 class="card-title">Lost Asset</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <div id="repair_card" class="card-body d-none">
                <h5 class="card-title">Repair Asset</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <script>
                const lent = document.getElementById('lent');
                const broken = document.getElementById('broken');
                const lost = document.getElementById('lost');
                const repair = document.getElementById('repair');

                const lent_card = document.getElementById('lent_card');
                const broken_card = document.getElementById('broken_card');
                const lost_card = document.getElementById('lost_card');
                const repair_card = document.getElementById('repair_card');

                function reset_card() {
                    lent.classList.remove("active");
                    broken.classList.remove("active");
                    lost.classList.remove("active");
                    repair.classList.remove("active");

                    lent_card.classList.remove("d-block");
                    broken_card.classList.remove("d-block");
                    lost_card.classList.remove("d-block");
                    repair_card.classList.remove("d-block");

                    lent_card.classList.add("d-none");
                    broken_card.classList.add("d-none");
                    lost_card.classList.add("d-none");
                    repair_card.classList.add("d-none");
                };

                lent.addEventListener("click", function() {
                    reset_card();
                    this.classList.add("active");
                    lent_card.classList.remove("d-none");
                    lent_card.classList.add("d-block");
                });

                broken.addEventListener("click", function() {
                    reset_card();
                    this.classList.add("active");
                    broken_card.classList.remove("d-none");
                    broken_card.classList.add("d-block");
                });
                lost.addEventListener("click", function() {
                    reset_card();
                    this.classList.add("active");
                    lost_card.classList.remove("d-none");
                    lost_card.classList.add("d-block");
                });
                repair.addEventListener("click", function() {
                    reset_card();
                    this.classList.add("active");
                    repair_card.classList.remove("d-none");
                    repair_card.classList.add("d-block");
                })
            </script>
        </div>
    </div>
</div>