import VueRouter from "vue-router";
import HeaderComponent from "./components/HeaderComponent";
import TaskListComponent from "./components/TaskListComponent";
import TaskShowComponent from "./components/TaskShowComponent";
import TaskCreateComponent from "./components/TaskCreateComponent";

require("./bootstrap");

window.Vue = require("vue").default;

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
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
        }
    ]
});

Vue.component("header-component", HeaderComponent);

const app = new Vue({
    el: "#app",
    router
});
