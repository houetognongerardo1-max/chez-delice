(() => {
  "use strict";

  /* ---------- Mobile nav ---------- */
  const nav = document.getElementById("nav");
  const navToggle = document.getElementById("navToggle");
  const navOverlay = document.getElementById("navOverlay");

  const closeNav = () => {
    nav?.classList.remove("is-open");
    navToggle?.classList.remove("is-active");
    navOverlay?.classList.remove("is-active");
    navToggle?.setAttribute("aria-expanded", "false");
  };

  navToggle?.addEventListener("click", () => {
    const isOpen = nav?.classList.toggle("is-open");
    navToggle.classList.toggle("is-active", !!isOpen);
    navOverlay?.classList.toggle("is-active", !!isOpen);
    navToggle.setAttribute("aria-expanded", String(!!isOpen));
  });
  navOverlay?.addEventListener("click", closeNav);
  document.querySelectorAll("[data-nav]").forEach((link) => link.addEventListener("click", closeNav));

  /* ---------- Reveal on scroll ---------- */
  const revealObserver = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("in-view");
          obs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.15 }
  );
  document.querySelectorAll("[data-reveal]").forEach((el) => revealObserver.observe(el));

  /* ---------- Menu tabs ---------- */
  const tabs = document.querySelectorAll(".menu-tab");
  const panels = document.querySelectorAll(".menu-panel");

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const target = tab.getAttribute("data-tab");
      tabs.forEach((t) => t.classList.toggle("is-active", t === tab));
      panels.forEach((p) => p.classList.toggle("is-active", p.getAttribute("data-panel") === target));
    });
  });

  /* ---------- Back to top ---------- */
  const backToTop = document.getElementById("backToTop");
  document.addEventListener(
    "scroll",
    () => backToTop?.classList.toggle("is-visible", window.scrollY > 500),
    { passive: true }
  );
  backToTop?.addEventListener("click", () => window.scrollTo({ top: 0, behavior: "smooth" }));

  /* ---------- Footer year ---------- */
  const yearEl = document.getElementById("year");
  if (yearEl) yearEl.textContent = String(new Date().getFullYear());

  /* ---------- Scroll to reservation section with open error/flash ---------- */
  if (window.location.hash === "#reservation") {
    document.getElementById("reservation")?.scrollIntoView({ behavior: "smooth" });
  }
})();
