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
                            <button class="btn btn-success">Изменить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'costEdit',
        data: function () {
            return {
                costId: null,
                cost: {
                    category_id: '',
                    pay: ''
                },
                categories: {}
            }
        },
        mounted() {
            var app = this;
            var id = app.$route.params.id;
            app.costId = id;

            axios.get('/api/v1/categories')
                .then(function (resp) {
                    app.categories = resp.data;
                })
                .catch(function (resp) {
                    alert("Не может загрузить категории");
                });
            axios.get('/api/v1/costs/' + id)
                .then(function (resp) {
                    app.cost = resp.data;
                })
                .catch(function () {
                    alert("Не может загрузить статью расходов")
                });
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var cost = app.cost;
                axios.put('/api/v1/costs/' + app.costId, cost)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        alert("Не может изменить ваш Расход");
                    });
            }
        }
    }
</script>
