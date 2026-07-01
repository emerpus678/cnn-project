 // ── SVG canvas dimensions ──
 const SVG_W = 812;
 const SVG_H = 582;
 // SVG circle radius = 82  →  diameter = 164
 // Ring should be (164 / 812) = 20.2% of the container width
 const RING_RATIO = 164 / SVG_W; // fraction of container width

 // ── Position + size nodes to match SVG circles ──
 function positionNodes() {
   const diagram = document.querySelector('.ce-diagram');
   if (!diagram) return;

   const containerW = diagram.offsetWidth;
   const ringPx = Math.round(containerW * RING_RATIO);
   const captionW = Math.round(ringPx * 1.1); // slightly wider than ring

   document.querySelectorAll('.ce-node').forEach(node => {
     const cx = parseFloat(node.dataset.cx);
     const cy = parseFloat(node.dataset.cy);

     // Position: percentage of container so it scales with resize
     node.style.left = (cx / SVG_W * 100) + '%';
     node.style.top = (cy / SVG_H * 100) + '%';

     // Ring size: exact match to SVG circle
     const ring = node.querySelector('.ce-icon-ring');
     if (ring) {
       ring.style.setProperty('--ring-size', ringPx + 'px');
     }

     // Caption: constrained to ring width so text wraps neatly
     const caption = node.querySelector('.ce-caption');
     if (caption) {
       caption.style.width = captionW + 'px';
     }
   });
 }

 // Re-run on resize so everything stays aligned
 positionNodes();
 window.addEventListener('resize', positionNodes);

 // ── Lottie loader with hover replay ──
 function loadLottie(containerId, path) {
   const container = document.getElementById(containerId);
   if (!container) return null;

   const anim = lottie.loadAnimation({
     container,
     renderer: 'svg',
     loop: false,
     autoplay: true,
     path
   });

   const ring = container.closest('.ce-icon-ring');
   if (ring) {
     ring.addEventListener('mouseenter', () => { anim.stop(); anim.play(); });
   }
   return anim;
 }

 const files = {
   darwin: '../assets/animations/Animation/IBM_Icon_Darwin_V1.json',
   data: '../assets/animations/Animation/IBM_Icon_Data_V1.json',
   architect: '../assets/animations/Animation/IBM_Icon_Architect_V1.json',
   ai: '../assets/animations/Animation/IBM_Icon_AI_V1.json',
   agile: '../assets/animations/Animation/IBM_Icon_Agile_V1.json',
   talent: '../assets/animations/Animation/IBM_Icon_Talent_V1.json',
   exptech: '../assets/animations/Animation/ExponentialTech.json',
 };

 // Desktop nodes
 Object.entries(files).forEach(([key, path]) => loadLottie(`lottie-${key}`, path));
 // Mobile nodes
 Object.entries(files).forEach(([key, path]) => loadLottie(`lottie-${key}-m`, path));