<div class="panel panel-default">
    <div class="panel-heading">
        <h3>School Settings</h3><hr/>
    </div>
    <div class="panel-body">
        <tabset justified="false" type="pills">
            <tab>
                <tab-heading>
                    Profile
                </tab-heading>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <div>
                                <div class="form-horizontal">
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Email:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-email="user.email">@{{ user.email || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Tel:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-tel="user.tel" e-pattern="\d{3}-\d{2}-\d{2}" e-title="xxx-xx-xx">@{{ user.tel || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Number:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-number="user.number" e-min="18">@{{ user.number || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Range:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-range="user.range" e-step="5">@{{ user.range || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Url:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-url="user.url">@{{ user.url || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Search:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-search="user.search">@{{ user.search || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Color:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-color="user.color">@{{ user.color || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Date:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-date="user.date">@{{ user.date || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Time:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-time="user.time">@{{ user.time || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Datetime:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-datetime="user.datetime">@{{ user.datetime || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Month:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-month="user.month">@{{ user.month || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Week:</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-week="user.week">@{{ user.week || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tab>
            <tab>
                <tab-heading>
                    Home Page
                </tab-heading>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Controls</div>
                            <div class="panel-body">
                                <div class="form-horizontal">
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Text</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-text="user.name">@{{ user.name || &apos;empty&apos; }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Local Select</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-select="user2.status" e-ng-options="s.value as s.text for s in statuses">@{{ showStatus() }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Remote Select</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-select="user3.text" ng-init="loadGroups()" e-ng-options="g.text as g.text for g in groups">@{{ user3.text || &apos;not set&apos; }}  </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Textarea</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-textarea="user.desc" e-rows="3" e-cols="30">@{{ user.desc || 'no description' }}    </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group m0">
                                        <label class="col-sm-4 control-label">Typeahead</label>
                                        <div class="col-sm-8">
                                            <p class="form-control-static"><a href="#" editable-text="user4.state" e-typeahead="state for state in states | filter:$viewValue | limitTo:8">@{{ user4.state || &apos;empty&apos; }}  </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tab>
        </tabset>

    </div>
</div>