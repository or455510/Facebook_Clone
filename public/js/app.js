document.addEventListener("DOMContentLoaded", () => {

  // حذف تعليق — استخدام delegation
  document.addEventListener("click", async (e) => {
    if (!e.target.classList.contains("delete-comment")) return;

    const btn = e.target;
    const commentEl = btn.closest(".comment");
    const commentId = btn.dataset.id;

    if (!commentId) return console.error("no comment id on button");

    // تأكيد الحذف
    if (!confirm("هل أنت متأكد أنك تريد حذف هذا التعليق؟")) return;

    btn.disabled = true;
    btn.textContent = "جاري الحذف...";

    const tokenMeta = document.querySelector('meta[name="csrf-token"]');
    if (!tokenMeta) {
      alert("CSRF token missing");
      btn.disabled = false;
      btn.textContent = "حذف";
      return;
    }

    try {
      const res = await fetch(`/comments/${commentId}`, {
        method: "DELETE",
        headers: {
          "X-CSRF-TOKEN": tokenMeta.content,
          "Accept": "application/json",
          "X-Requested-With": "XMLHttpRequest"
        }
      });

      if (!res.ok) {
        // حاول قراءة رسالة الخطأ من السيرفر
        const err = await res.json().catch(() => null);
        console.error("Delete failed", res.status, err);
        alert(err?.message || "فشل حذف التعليق");
        btn.disabled = false;
        btn.textContent = "حذف";
        return;
      }

      const data = await res.json();
      if (data.success) {
        // إزالة العنصر من DOM
        if (commentEl) commentEl.remove();
      } else {
        alert("فشل حذف التعليق");
        btn.disabled = false;
        btn.textContent = "حذف";
      }
    } catch (error) {
      console.error("Network/error", error);
      alert("حدث خطأ، تأكد من الاتصال أو افحص الكونسول");
      btn.disabled = false;
      btn.textContent = "حذف";
    }
  });

});
