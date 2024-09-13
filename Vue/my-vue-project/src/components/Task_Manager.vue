<template>
  <div class="app">
    <h1>{{ title }}</h1>

    <input type="text" v-model="newTask" @keyup.enter="addTask" placeholder="Add a new task">
    <button @click="addTask">Add Task</button>

    <h2>Tasks</h2>

    <ul>
      <li v-for="(task, index) in tasks" :key="index" class="task">
        <span :class="{ completed: task.completed }">{{ task.name }}</span>
        <span>{{ task.completed ? 'Done' : 'Pending' }}</span>
        <div>
          <button @click="toggleTaskCompletion(task)">Complete</button>
          <button @click="removeTask(task, index)">Delete</button>
        </div>
      </li>
    </ul>

    <p v-if="tasks.length === 0">No tasks available.</p>
    <h3>Task Status: {{ taskStatus }}</h3>
    <p>Total Tasks: {{ tasks.length }}</p>
    <p>Completed Tasks: {{ completedTasks.length }}</p>
    <p>Incomplete Tasks: {{ incompleteTasks.length }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      title: 'Vue 2 Task Manager',
      newTask: '',
      tasks: [
        { name: 'Learn Vue.js', completed: false },
        { name: 'Learn Laravel', completed: false },
      ]
    };
  },
  computed: {
    completedTasks() {
      return this.tasks.filter(task => task.completed);
    },
    incompleteTasks() {
      return this.tasks.filter(task => !task.completed);
    },
    taskStatus() {
      return this.completedTasks.length === this.tasks.length && this.tasks.length > 0
        ? 'All tasks completed!'
        : 'There are tasks to complete.';
    }
  },
  methods: {
    addTask() {
      const taskName = this.newTask.trim();
      if (taskName) {
        this.tasks.push({ name: taskName, completed: false });
        this.newTask = '';
      } else {
        alert('Task name cannot be empty!');
      }
    },
    removeTask(task, index) {
      if (task.completed) {
        this.tasks.splice(index, 1);
      } else {
        alert('Complete the task before deleting!');
      }
    },
    toggleTaskCompletion(task) {
      task.completed = !task.completed;
    }
  }
};
</script>

<style scoped>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
  background-color: #f5f5f5;
}

.app {
  max-width: 600px;
  margin: 0 auto;
  background: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.task {
  padding: 10px;
  border-bottom: 1px solid #ddd;
  display: flex;
  justify-content: space-between;
}

.task:last-child {
  border-bottom: none;
}

.completed {
  text-decoration: line-through;
  color: #aaa;
}
</style>
