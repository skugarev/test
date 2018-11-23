<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">
                Назад
            </router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Создание статьи расхода
            </div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Категория</label>
                            <select v-model="cost.category_id" class="form-control" required>
                                <option disabled value="">Выберите категорию</option>
                                <option v-for="category in categories" v-bind:value="category.id">
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Расход</label>
                            <input type="number" v-model="cost.pay" class="form-control" required step="0.01">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Создать</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'costCreate',
        data: function () {
            return {
                cost: {
                    category_id: '',
                    pay: ''
                },
                categories: {}
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/categories')
                .then(function (resp) {
                    app.categories = resp.data;
                })
                .catch(function (resp) {
                    alert("Не может загрузить Категории");
                });
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var cost = app.cost;
                axios.post('/api/v1/costs', cost)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        alert("Не может создать ваш Расход");
                    });
            }
        }
    }
</script>