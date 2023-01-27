<template>
    <div v-for="book in books" class="p-6">
        <img class="object-cover object-center w-full mb-8 lg:h-48 md:h-36 rounded-xl" src="/images/squareCard.svg" alt="blog">
        <div class="inline-flex justify-between w-full">
            <h1 class="mb-8 text-xl font-semibold leading-none tracking-tighter text-neutral-600">
                {{ book.book_title }}
            </h1>
            <span>EUR {{ book.price }}</span>
        </div>
        <p class="mx-auto text-base font-medium leading-relaxed text-gray-500">
            {{ book.description }}
        </p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            books: []
        }
    },
    methods: {
        getBooks() {
            axios.get('/api/books')
                .then((response) => {
                    this.books = response.data.data
                })
        }
    },
    mounted() {
        this.getBooks()
    }
}
</script>