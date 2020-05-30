<template>
    <div>
        <h3 class="text-center">All Books</h3><br />
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books" :key="book.id">
                    <td>{{book.name}}</td>
                    <td>{{book.author}}</td>
                    <td>
                        <div class="btn-group">
                            <router-link :to="{name: 'edit', params: { id: book.id }}" class="btn btn-primary">Edit</router-link>
                            <button class="btn btn-danger" @click="deleteBook(book.id)">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return {
            books: []
        }
    },
    created(){
        this.axios
            .get('http://127.0.0.1:8000/api/books')
            .then(response => {
                this.books = response.data;
            });
    },
    methods: {
        deleteBook(id){
            this.axios
                .delete(`http://localhost:8000/api/book/delete/${id}`)
                .then(response => {
                    let i = this.books.map(item => item.id).indexOf(id); // find index of your object
                    this.books.splice(i, 1)
                });
        }
    }
}
</script>
