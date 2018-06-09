@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello VUE!</div>
                <div class="card-body">
                    <div id="app">
                        @{{ message }}
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">связавать атрибуты элементов</div>
                <div class="card-body">
                    <div id="app-2">
                        <span v-bind:title="message">
                          Наведи курсор на меня пару секунд, чтобы увидеть динамически связанное значение title!
                        </span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Now I see you VUE!</div>
                <div class="card-body">
                    <div id="app-3">
                        <span v-if="seen">Сейчас меня видно</span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Now I see you VUE!</div>
                <div class="card-body">
                    <div id="app-4">
                        <input type="text"><input type='button' value="Add New" id="button">

                        <ol>
                          <li v-for="todo in todos">
                            @{{ todo.text }}
                          </li>
                        </ol>
                    </div>
                </div>
                <div class="card-body">
                    <div id="app-5">
                        <p>@{{ message }}</p>
                        <button v-on:click="reverseMessage">Перевернуть сообщение</button>
                    </div>
                </div>
                
                <div class="card-body">
                    <div id="app-6">
                        <p>@{{ message }}</p>
                        <input v-model="message">
                    </div>
                </div>
                
                <div class="card-body">
                    <div id="app-7">
                        <ol>
                            <todo-item
                             v-for="item in groceryList"
                             v-bind:todo="item"
                             v-bind:key="item.id">
                            </todo-item>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
var app = new Vue({
    el: '#app',
    data: {
      message: 'Привет, Vue!'
    }
});
var app2 = new Vue({
    el: '#app-2',
    data: {
      message: 'Вы загрузили эту страницу в: ' + new Date().toLocaleString()
    }
});

var app3 = new Vue({
    el: '#app-3',
    data: {
      seen: true
    }
});

document.getElementById("app-3").addEventListener(
    'click', 
    function(){
        app3.seen = false;
    }
);
var app4 = new Vue({
    el: '#app-4',
    data: {
      todos: [
        { text: 'Изучить JavaScript' },
        { text: 'Изучить Vue' },
        { text: 'Создать что-нибудь классное' }
      ]
    }
});

document.getElementById("button").addEventListener(
    'click',
    function() {
        var newItem = document.querySelector('input[type="text"').value;
         app4.todos.push({ text: newItem });
    }
);
var app5 = new Vue({
    el: '#app-5',
    data: {
      message: 'Привет, Vue.js!'
    },
    methods: {
      reverseMessage: function () {
        this.message = this.message.split('').reverse().join('')
      }
    }
});
var app6 = new Vue({
    el: '#app-6',
    data: {
      message: 'Привет, Vue!'
    }
});

// Определяем новый компонент под названием todo-item
Vue.component('todo-item', {
    // Компонент todo-item теперь принимает
    // "prop", то есть пользовательский параметр.
    // Этот параметр называется todo.
    props: ['todo'],
    template: '<li>@{{ todo.text }}</li>'
  });
  
var app7 = new Vue({
    el: '#app-7',
    data: {
      groceryList: [
        { id: 0, text: 'Овощи' },
        { id: 1, text: 'Сыр' },
        { id: 2, text: 'Что там ещё люди едят?' }
      ]
    }
});
</script>
@endsection
