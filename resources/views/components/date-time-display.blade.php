<div class="text-sm text-gray-900" x-data="time()">
    <span x-text="getTime()"></span>
</div>


<script defer>
    function time() {
        return {
            newDate: new Date(),
            options: options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
            },
            init() {
                setInterval(() => {
                    this.newDate = new Date();
                }, 1000);
            },
            getTime() {
                return `${this.newDate.toLocaleDateString(undefined, this.options)} ${
                this.newDate.toLocaleTimeString('en-US')}`;
            },
        }
    }
</script>
