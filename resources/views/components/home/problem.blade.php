<!--The problem we solve-->
<section class="problem-we-solve-section">
    <div class="problem-we-solve-container">
        <h1 class="problem-we-solve-title uppercase">The Problem We Solve</h1>
        <div class="problem-we-solve-content">
            <p>
                We transform off-plan real estate sales by showcasing projects
                based on their true merit and potential, not just an agent’s
                reputation or glossy brochures.  We provide comprehensive,
                data-driven insights that empower investors to make decisions
                based on a project’s actual value, fostering a more transparent
                and efficient marketplace where quantified and holistically proven
                quality speaks louder than sales pitches.
            </p>
        </div>
        <div class="how-we-serve-container">
            <h1 class="how-we-serve-title uppercase">How we serve</h1>
            <button class="investors-btn uppercase">Investors</button>
            <button class="developers-btn uppercase">Developers</button>
        </div>
    </div>
</section>

<!--Primary Resale Land section-->
<section class="primary-resale-land-section">
    <!-- Add the sub-grid here -->
    <div class="sub-grid-container">
        <div class="grid grid-cols-3 grid-rows-1 gap-4">
            <div
                class="bg-cover bg-center h-48 flex items-center justify-center rounded-2xl"
                style="
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.9)
                  ),
                  url('{{ asset('assets/img') }}/common/primary.svg');
              "
            >
                <div class="p-4">
                    <h3 class="text-white text-4xl font-bold uppercase">Primary</h3>
                </div>
            </div>
            <div
                class="bg-cover bg-center h-48 flex items-center justify-center rounded-2xl"
                style="
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.9)
                  ),
                  url('{{ asset('assets/img') }}/common/resale.svg');
              "
            >
                <div class="p-4">
                    <h3 class="text-white text-4xl font-bold uppercase">Resale</h3>
                </div>
            </div>
            <div
                class="bg-cover bg-center h-48 flex items-center justify-center rounded-2xl"
                style="
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.9)
                  ),
                  url('{{ asset('assets/img') }}/common/land.svg');
              "
            >
                <div class="p-4">
                    <h3 class="text-white text-4xl font-bold uppercase">Land</h3>
                </div>
            </div>
        </div>
    </div>
</section>
