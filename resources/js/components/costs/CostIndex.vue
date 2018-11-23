<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-body">
                <form v-on:change="searchForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Дата</label>
                            <datepicker v-model="date" range></datepicker>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Категория</label>
                            <select v-model="category_id" class="form-control">
                                <option disabled value="">Выберите категорию</option>
                                <option v-for="category in categories" v-bind:value="category.id">
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="form-group">
            <router-link :to="{name: 'costCreate'}" class="btn btn-success">
                Создание расхода
            </router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Расходы
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Категория</th>
                        <th>Расход</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="cost, index in costs">
                        <td>{{ cost.id }}</td>
                        <td>{{ cost.category_name }}</td>
                        <td>{{ cost.pay }}</td>
                        <td>
                            <router-link :to="{name: 'costEdit', params: {id: cost.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(cost.id, index)">
                                Удалить
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <pagination v-model="page" :records="total" :per-page="10" @paginate="pagination"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    import datepicker from 'vue-date';
    import Pagination from 'vue-pagination-2';

    export default {
        name: 'CostIndex',
        components: {datepicker, Pagination},
        data: function () {
            return {
                costs: [],
                date: [],
                categories: {},
                category_id: '',
                page: 1,
                total: 0
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/costs')
                .then(function (resp) {
                    app.costs = resp.data.data;
                    app.total = resp.data.meta.total;
                })
                .catch(function (resp) {
                    alert("Не может загрузить статьи расходов");
                });
            axios.get('/api/v1/categories')
                .then(function (resp) {
                    app.categories = resp.data;
                })
                .catch(function (resp) {
                    alert("Не может загрузить Категории");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Вы действительно хотите удалить?")) {
                    var app = this;
                    axios.delete('/api/v1/costs/' + id)
                        .then(function (resp) {
                            app.costs.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Не может удалить ваш Расход");
                        });
                }
            },
            pagination() {
                event.preventDefault();
                this.getCosts();
            },
            searchForm() {
                event.preventDefault();
                this.getCosts();
            },
            getCosts() {
                var app = this;
                var url = '?category_id='+app.category_id+'&date_from='+app.date[0]
                    +'&date_to='+app.date[1]
                    +'&page='+app.page;
                axios.get('/api/v1/costs'+url)
                    .then(function (resp) {
                        app.costs = resp.data.data;
                        app.total = resp.data.meta.total;
                    })
                    .catch(function (resp) {
                        alert("Не может загрузить статьи расходов");
                    });
            },
        }
    }
</script>
<style>
    .date-picker {
        width: 300px;
    }
</style>