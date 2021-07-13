import VueRouter from "vue-router";
import Login from "./components/Login.vue";
import HeaderComponent from "./components/HeaderComponent";
import TaskListComponent from "./components/TaskListComponent";
import TaskShowComponent from "./components/TaskShowComponent";
import TaskCreateComponent from "./components/TaskCreateComponent";
import TaskEditComponent from "./components/TaskEditComponent";

require("./bootstrap");

window.Vue = require("vue").default;

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/login",
            name: "login",
            component: Login
        },
        {
            path: "/tasks",
            name: "task.list",
            component: TaskListComponent
        },
        {
            path: "/tasks/:taskId",
            name: "task.show",
            component: TaskShowComponent,
            props: true
        },
        {
            path: "/tasks/create",
            name: "task.create",
            component: TaskCreateComponent
        },
        {
            path: "/tasks/:taskId/edit",
            name: "task.edit",
            component: TaskEditComponent,
            props: true
        }
    ]
});

router.beforeEach(function(to, from, next) {
    if (to.path === "/") {
        next("/login");
    } else {
        next();
    }
});

Vue.component("header-component", HeaderComponent);

const app = new Vue({
    el: "#app",
    router
});
