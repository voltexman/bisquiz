<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('question', 'QUESTION_PAGE_TITLE');
$this->params['icon'] = 'pe-7s-menu icon-gradient bg-ripe-malin';
$this->params['subtitle'] = Yii::t('question', 'QUESTION_PAGE_SUBTITLE');
?>
<div class="question-index">

    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-database icon-gradient bg-malibu-beach"> </i>Tasks List
                    </div>
                    <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                        <div class="btn-group dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                <i class="pe-7s-menu btn-icon-wrapper"></i>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu">
                                <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-inbox"> </i><span>Menus</span>
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span>
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-book"> </i><span>Actions</span>
                                </button>
                                <div tabindex="-1" class="dropdown-divider"></div>
                                <div class="p-3 text-right">
                                    <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                    <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="scroll-area-lg">
                    <div class="scrollbar-container ps ps--active-y">
                        <div class="p-2">
                            <ul class="todo-list-wrapper list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Wash the car
                                                    <div class="badge badge-danger ml-2">Rejected</div>
                                                </div>
                                                <div class="widget-subheading"><i>Written by Bob</i></div>
                                            </div>
                                            <div class="widget-content-right widget-content-actions">
                                                <button class="border-0 btn-transition btn btn-outline-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="border-0 btn-transition btn btn-outline-danger">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-focus"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox1" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox1">&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Task with dropdown menu</div>
                                                <div class="widget-subheading">
                                                    <div>By Johnny
                                                        <div class="badge badge-pill badge-info ml-2">NEW</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-right widget-content-actions">
                                                <div class="d-inline-block dropdown">
                                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="border-0 btn-transition btn btn-link">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </button>
                                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                        <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                        <button type="button" disabled="" tabindex="-1" class="disabled dropdown-item">Action</button>
                                                        <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                                                        <div tabindex="-1" class="dropdown-divider"></div>
                                                        <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-primary"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox4" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox4">&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Badge on the right task</div>
                                                <div class="widget-subheading">This task has show on hover actions!</div>
                                            </div>
                                            <div class="widget-content-right widget-content-actions">
                                                <button class="border-0 btn-transition btn btn-outline-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </div>
                                            <div class="widget-content-right ml-3">
                                                <div class="badge badge-pill badge-success">Latest Task</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-info"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox2" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox2">&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="42" class="rounded" src="assets/images/avatars/1.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Go grocery shopping</div>
                                                <div class="widget-subheading">A short description for this todo item</div>
                                            </div>
                                            <div class="widget-content-right widget-content-actions">
                                                <button class="border-0 btn-transition btn btn-outline-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="border-0 btn-transition btn btn-outline-danger">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-success"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox3" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox3">&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Development Task</div>
                                                <div class="widget-subheading">Finish React ToDo List App</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="badge badge-warning mr-2">69</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <button class="border-0 btn-transition btn btn-outline-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="border-0 btn-transition btn btn-outline-danger">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Wash the car
                                                    <div class="badge badge-danger ml-2">Rejected</div>
                                                </div>
                                                <div class="widget-subheading"><i>Written by Bob</i></div>
                                            </div>
                                            <div class="widget-content-right widget-content-actions">
                                                <button class="border-0 btn-transition btn btn-outline-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="border-0 btn-transition btn btn-outline-danger">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-focus"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox1" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox1">&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Task with dropdown menu</div>
                                                <div class="widget-subheading">
                                                    <div>By Johnny
                                                        <div class="badge badge-pill badge-info ml-2">NEW</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-right widget-content-actions">
                                                <div class="d-inline-block dropdown">
                                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="border-0 btn-transition btn btn-link">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </button>
                                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                        <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                        <button type="button" disabled="" tabindex="-1" class="disabled dropdown-item">Action</button>
                                                        <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                                                        <div tabindex="-1" class="dropdown-divider"></div>
                                                        <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-primary"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox4" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox4">&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Badge on the right task</div>
                                                <div class="widget-subheading">This task has show on hover actions!</div>
                                            </div>
                                            <div class="widget-content-right widget-content-actions">
                                                <button class="border-0 btn-transition btn btn-outline-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </div>
                                            <div class="widget-content-right ml-3">
                                                <div class="badge badge-pill badge-success">Latest Task</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-info"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox2" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox2">&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="42" class="rounded" src="assets/images/avatars/1.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Go grocery shopping</div>
                                                <div class="widget-subheading">A short description for this todo item</div>
                                            </div>
                                            <div class="widget-content-right widget-content-actions">
                                                <button class="border-0 btn-transition btn btn-outline-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="border-0 btn-transition btn btn-outline-danger">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-success"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox3" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox3">&nbsp;</label>
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Development Task</div>
                                                <div class="widget-subheading">Finish React ToDo List App</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="badge badge-warning mr-2">69</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <button class="border-0 btn-transition btn btn-outline-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="border-0 btn-transition btn btn-outline-danger">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 232px;"></div></div></div>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="mr-2 btn btn-link btn-sm">Cancel</button>
                    <button class="btn btn-primary">Add Task</button>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card no-shadow bg-white no-border rm-borders">
                <div class="card-body"><p>Для наглядности и практичности мы собрали здесь список всех ваших вопросов и квизов вместе.</p><p>Здесь можно ы</p></div>
            </div>
        </div>
    </div>

</div>
