<?php
$task = 'backlog';

$projects = ["Вхідні", "Навчання", "Робота", "Домашні справи", "Авто"];

$tasks = [
    [
        'title' => 'Співбесіда в IT компанії',
        'project' => 'Робота',
        'status' => 'backlog',
        'due_date' => null,
    ],
    [
        'title' => 'Виконати тестове завдання',
        'project' => 'Робота',
        'status' => 'backlog',
        'due_date' => '19.05.2023',
    ],
    [
        'title' => 'Зробити завдання до першого уроку',
        'project' => 'Навчання',
        'status' => 'done',
        'due_date' => '27.07.2023',
    ],
    [
        'title' => 'Зустрітись з друзями',
        'project' => 'Вхідні',
        'status' => 'to-do',
        'due_date' => '14.05.2023',
    ],
    [
        'title' => 'Купити корм для кота',
        'project' => 'Домашні справи',
        'status' => 'in-progress',
        'due_date' => null,
    ],
    [
        'title' => 'Замовити піцу',
        'project' => 'Домашні справи',
        'status' => 'to-do',
        'due_date' => null,
    ],
];

function how_much ($tasks, $projects){
    $count = 0;
    foreach ($tasks as $tasks2) {
        if ($tasks2['project'] === $projects) {
            $count++;
        }
    }
    return $count;
}











function how_much_time ($tasks)
{

    $data_time = strtotime($tasks);
    $time_now = strtotime('now') + 10800;
    $difference = (($data_time - $time_now) / 60 / 60);

    if ($difference <= 24 && $difference >= -24) {
        return floor($difference) . ' годин';
    }
    return floor($difference / 24) . ' днів';
}










$name_title = 'Завдання та проекти | Дошка';
$name_image_src = 'static/img/user2-160x160.jpg';
$name_user = 'Володимир';


require 'helpers.php';

$renderKandan = renderTemplate('kanban.php', [
    'tasks' => $tasks,
]);

$rendermain = renderTemplate('main.php', [
    'name_image_src' => $name_image_src,
    'name_user' => $name_user,
    'projects' => $projects,
    'tasks' => $tasks,
    'renderKandan' => $renderKandan,
]);

print renderTemplate('layout.php', [
    'name_title' => $name_title,
    'rendermain' => $rendermain,
]);
