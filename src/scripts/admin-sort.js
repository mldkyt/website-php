(function () {
    var style = document.createElement("style");
    style.textContent =
        ".sortable { list-style: none; padding: 0; margin: 0; max-width: 640px; }" +
        ".sortable li { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; padding: 8px; border: 1px solid #333; margin-bottom: 6px; background: #111; }" +
        ".sortable li.dragging { opacity: 0.4; }" +
        ".drag-handle { cursor: grab; user-select: none; padding: 0 6px; color: #6C53A6; font-size: 1.2em; }" +
        ".drag-handle:active { cursor: grabbing; }" +
        ".sortable form { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin: 0; }" +
        "#order-status { margin-left: 10px; color: #6C53A6; }";
    document.head.appendChild(style);

    function getDragAfterElement(list, y) {
        var items = Array.prototype.slice.call(list.querySelectorAll("li:not(.dragging)"));
        return items.reduce(
            function (closest, child) {
                var box = child.getBoundingClientRect();
                var offset = y - box.top - box.height / 2;
                if (offset < 0 && offset > closest.offset) {
                    return { offset: offset, element: child };
                }
                return closest;
            },
            { offset: Number.NEGATIVE_INFINITY, element: null }
        ).element;
    }

    function saveOrder(list) {
        var ids = Array.prototype.slice.call(list.querySelectorAll("li")).map(function (li) {
            return li.dataset.id;
        });

        var body = new FormData();
        body.append("action", "reorder");
        ids.forEach(function (id) {
            body.append("order[]", id);
        });

        var status = document.getElementById("order-status");

        fetch(window.location.pathname, { method: "POST", body: body })
            .then(function (res) {
                if (!res.ok) throw new Error("request failed");
                if (status) status.textContent = "Order saved";
            })
            .catch(function () {
                if (status) status.textContent = "Failed to save order";
            });
    }

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".sortable").forEach(function (list) {
            var dragged = null;

            list.addEventListener("dragstart", function (e) {
                var handle = e.target.closest(".drag-handle");
                if (!handle || !list.contains(handle)) return;
                dragged = handle.closest("li");
                dragged.classList.add("dragging");
                e.dataTransfer.effectAllowed = "move";
                e.dataTransfer.setData("text/plain", dragged.dataset.id);
            });

            list.addEventListener("dragend", function () {
                if (!dragged) return;
                dragged.classList.remove("dragging");
                dragged = null;
                saveOrder(list);
            });

            list.addEventListener("dragover", function (e) {
                if (!dragged) return;
                e.preventDefault();
                var after = getDragAfterElement(list, e.clientY);
                if (after == null) {
                    list.appendChild(dragged);
                } else {
                    list.insertBefore(dragged, after);
                }
            });
        });
    });
})();
