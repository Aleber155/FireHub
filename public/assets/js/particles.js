function createFireParticles(sectionId) {
    const section = document.getElementById(sectionId);
    if (!section) return;

    const canvas = section.querySelector('canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');

    // 👇 SOLUCIÓN 1: Cambiar 'lighter' por 'source-over' para fondos claros
    ctx.globalCompositeOperation = 'source-over';

    let particles = [];

    function resizeCanvas() {
        const dpr = window.devicePixelRatio || 1;
        const rect = section.getBoundingClientRect();

        canvas.width = Math.floor(rect.width * dpr);
        canvas.height = Math.floor(rect.height * dpr);

        canvas.style.width = rect.width + 'px';
        canvas.style.height = rect.height + 'px';

        ctx.setTransform(1, 0, 0, 1, 0, 0);
        ctx.scale(dpr, dpr);
    }

    class FireParticle {
        constructor() {
            this.reset(true);
        }

        reset(initial = false) {
            this.x = Math.random() * section.offsetWidth;
            this.y = initial ? Math.random() * section.offsetHeight : section.offsetHeight + 20;

            this.size = Math.random() * 3 + 2;
            this.speedY = Math.random() * 1.2 + 0.8;
            this.speedX = (Math.random() - 0.5) * 0.4;

            // Incrementamos un poco la opacidad base para fondos claros
            this.opacity = Math.random() * 0.7 + 0.5;

            // 👇 SOLUCIÓN 2: Tonos rojos/naranjas ligeramente más intensos
            // para garantizar un excelente contraste contra el blanco
            const colors = ['220,38,38', '239,68,68', '255,90,0', '185,28,28'];
            this.color = colors[Math.floor(Math.random() * colors.length)];
        }

        update() {
            this.y -= this.speedY;
            this.x += this.speedX;
            this.opacity *= 0.996;

            if (this.y < -40) this.reset();
        }

        draw() {
            const gradient = ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.size);

            gradient.addColorStop(0, `rgba(${this.color},${this.opacity})`);
            gradient.addColorStop(1, `rgba(${this.color},0)`);

            ctx.fillStyle = gradient;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    function initParticles() {
        particles = [];
        const count = window.innerWidth < 768 ? 45 : 90;
        for (let i = 0; i < count; i++) {
            particles.push(new FireParticle());
        }
    }

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach((p) => {
            p.update();
            p.draw();
        });
        requestAnimationFrame(animate);
    }

    window.addEventListener('resize', () => {
        resizeCanvas();
        initParticles();
    });

    resizeCanvas();
    initParticles();
    animate();
}
