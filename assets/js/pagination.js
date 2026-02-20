class Pagination {
    constructor({ totalPages = 1, currentPage = 1, maxVisible = 5, 
                  containerId, prevButtonId, nextButtonId, 
                  onPageChange = null, onPrev = null, onNext = null }) {
        this.totalPages = totalPages;
        this.currentPage = currentPage;
        this.maxVisible = maxVisible;

        this.container = document.getElementById(containerId);
        this.prevButton = document.getElementById(prevButtonId);
        this.nextButton = document.getElementById(nextButtonId);

        this.onPageChange = onPageChange; // Called on any page click
        this.onPrev = onPrev;             // Called specifically on prev
        this.onNext = onNext;             // Called specifically on next

        this.init();
    }

    init() {
        this.render();
        this.attachEvents();
    }

    createPageItem(page) {
        return `<li class="page-item ${page === this.currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${page}">${page}</a>
                </li>`;
    }

    generatePagination() {
        const pagination = [];

        if (this.totalPages <= this.maxVisible) {
            for (let i = 1; i <= this.totalPages; i++) pagination.push(this.createPageItem(i));
            return pagination.join("\n");
        }

        pagination.push(this.createPageItem(1));

        let left = this.currentPage - Math.floor((this.maxVisible - 3) / 2);
        let right = this.currentPage + Math.floor((this.maxVisible - 3) / 2);

        if (left < 2) {
            right += 2 - left;
            left = 2;
        }

        if (right > this.totalPages - 1) {
            left -= right - (this.totalPages - 1);
            right = this.totalPages - 1;
            if (left < 2) left = 2;
        }

        if (left > 2) pagination.push(`<li class="page-item disabled"><span class="page-link">..</span></li>`);

        for (let i = left; i <= right; i++) pagination.push(this.createPageItem(i));

        if (right < this.totalPages - 1) pagination.push(`<li class="page-item disabled"><span class="page-link">..</span></li>`);

        pagination.push(this.createPageItem(this.totalPages));

        return pagination.join("\n");
    }

    render() {
        this.container.innerHTML = this.generatePagination();
        this.prevButton.classList.toggle("disabled", this.currentPage === 1);
        this.nextButton.classList.toggle("disabled", this.currentPage === this.totalPages);
    }

    attachEvents() {
        // Page number click
        this.container.addEventListener("click", (e) => {
            const target = e.target;
            if (target.matches(".page-link[data-page]")) {
                e.preventDefault();
                const selectedPage = parseInt(target.dataset.page);
                if (!isNaN(selectedPage) && selectedPage !== this.currentPage) {
                    this.currentPage = selectedPage;
                    this.render();
                    if (typeof this.onPageChange === "function") this.onPageChange(this.currentPage);
                }
            }
        });

        // Prev button
        this.prevButton.addEventListener("click", () => {
            if (this.currentPage > 1) {
                this.currentPage--;
                this.render();
                if (typeof this.onPrev === "function") this.onPrev(this.currentPage);
                if (typeof this.onPageChange === "function") this.onPageChange(this.currentPage);
            }
        });

        // Next button
        this.nextButton.addEventListener("click", () => {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
                this.render();
                if (typeof this.onNext === "function") this.onNext(this.currentPage);
                if (typeof this.onPageChange === "function") this.onPageChange(this.currentPage);
            }
        });
    }

    // Optional: dynamically update total pages
    updateTotalPages(newTotal) {
        this.totalPages = newTotal;
        if (this.currentPage > newTotal) this.currentPage = newTotal;
        this.render();
    }
}