<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
              <a href="" 
                ng-click="quickEnroll.openDialog($event)" 
                class="btn btn-default pull-right">Quick Enroll</a>
                
                <h3 style="display: inline">Enroll Student</h3>
                <hr/>
            </div>

            <div class="panel-body">
                <form
                      ng-init="EnrollStudentPostUrl = '{{ route('admin.modules.students.store',[],false)  }}'"
                      name="enrollStudentForm"
                      ng-submit="enrollStudent(student)"
                        >
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-horizontal">
                                <h5 class="mt5"><strong>Personal Information</strong></h5>
                                <hr/>
                                <div class="form-group mt5">
                                    <div class="col-sm-4">
                                        <img style="max-height: 120px" class="img-responsive"
                                             ng-src="@{{student.picture.dataURL || '/img/placeholder.jpg'}}"
                                             type="@{{student.picture.file.type}}"/>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="inputImage"
                                               filestyle=""
                                               type="file"
                                               data-classbutton="btn btn-default"
                                               data-classinput="form-control inline"
                                               class="form-control"
                                               accept="image/*"
                                               name="student.picture"
                                               image="student.picture"/>
                                    </div>
                                </div>
                                <div class="form-group mt5">
                                    <div class="col-sm-6">
                                        <input type="text"
                                               required=""
                                               ng-model="student.last_name"
                                               name="student.last_name"
                                               class="form-control"
                                               placeholder="Last Name"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="text"
                                               required=""
                                               ng-model="student.first_name"
                                               name="student.first_name"
                                               class="form-control"
                                               placeholder="First Name"/>
                                    </div>
                                </div>
                                <div class="form-group mt5">
                                    <div class="col-sm-6">
                                        <input type="text"
                                               required=""
                                               class="form-control"
                                               ng-model="student.middle_name"
                                               name="student.middle_name"
                                               placeholder="Middle Name"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <select class="form-control"
                                                required=""
                                                ng-model="student.sex"
                                                name="student.sex">
                                            <option value="">Sex</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt5">
                                    <div class="col-sm-6">
                                        <p class="input-group">
                                                <input  ng-disabled="student.saving" type="text"
                                                        placeholder="Birth Date" class="form-control"
                                                        datepicker-popup ng-model="student.birth_date"
                                                        is-open="student.birthDateOpened"/>
                                                <span class="input-group-btn">
                                                   <button type="button"
                                                           ng-click="openBirthDate($event,student)"
                                                           class="btn btn-default">
                                                       <em class="fa fa-calendar"></em>
                                                   </button>
                                                </span>
                                            </p>
                                    </div>

                                    <div class="col-sm-6">
                                        <select class="form-control" ng-model="student.religion" name="student.religion">
                                            <option value="">Religion</option>
                                            <option value="christian">Christian</option>
                                            <option value="muslim">Muslim</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt5">
                                    <div class="col-sm-6">
                                        <select class="form-control" ng-model="student.country" name="student.country">
                                            <option value="">Country</option>
                                            <option value="nigeria">Nigeria</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <select class="form-control" ng-model="student.state" name="student.state">
                                            <option value="">State</option>
                                            <option value="abia">Abia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt5">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" ng-model="student.lga" name="student.lga"
                                               placeholder="L.G.A"/>
                                    </div>

                                    <div class="col-sm-6">
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-horizontal">
                                <h5 class="mt5"><strong>School Information</strong></h5>
                                <hr/>
                                <div class="form-group mt5">
                                    <div class="col-sm-6">
                                        <input type="text"
                                               ng-model="student.session"
                                               required=""
                                               data-inputmask="'mask': '9999/9999'"
                                               masked=""
                                               name="student.session"
                                               class="form-control"
                                               placeholder="Session eg 2014/2015"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control"
                                                required=""
                                                ng-model="student.sub_session"
                                                ng-options="category.id as category.display_name for category in sub_sessions"
                                                name="student.sub_session">
                                            <option value="">Select Term</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mt5">
                                    <div class="col-sm-6">
                                        <select class="form-control"
                                                required=""
                                                ng-model="student.school_category"
                                                ng-options="category.id as category.display_name for category in schoolCategories"
                                                name="student.school_category">
                                            <option value="">Select School Category</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control"
                                                required=""
                                                ng-model="student.school_class"
                                                ng-options="category.id as category.display_name for category in classes"
                                                name="student.school_class">
                                            <option value="">Select a Class</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mt5">
                                    <div class="col-sm-6">
                                        <p class="input-group">
                                            <input  ng-disabled="student.saving"
                                                    type="text"
                                                    name="student.admission_date"
                                                    placeholder="Date of Admission"
                                                    class="form-control"
                                                    datepicker-popup
                                                    ng-model="student.admission_date"
                                                    is-open="student.admissionDateOpened"/>
                                                <span class="input-group-btn">
                                                   <button type="button"
                                                           ng-click="openAdmissionDate($event,student)"
                                                           class="btn btn-default">
                                                       <em class="fa fa-calendar"></em>
                                                   </button>
                                                </span>
                                        </p>
                                    </div>
                                    {{--<div class="col-sm-6">--}}
                                        {{--<select class="form-control"--}}
                                                {{--required=""--}}
                                                {{--ng-model="student.admission_status"--}}
                                                {{--name="student.admission_status">--}}
                                            {{--<option value="">Active</option>--}}
                                            {{--<option value="first">First</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                </div>


                                <h5 class="mt5"><strong>Medical Information</strong></h5>
                                <hr/>
                                <div class="form-group mt5">
                                    <div class="col-sm-6">
                                        <select class="form-control"
                                                ng-model="student.blood_group"
                                                name="student.blood_group">
                                            <option value="">Blood Group</option>
                                            <option value="active">Active</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <select class="form-control"
                                                ng-model="student.genotype"
                                                name="student.genotype">
                                            <option value="">Genotype</option>
                                            <option value="active">Active</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mt5">
                                    <div class="col-sm-12">
                                        <input type="text" tagsinput="tagsinput"
                                               ng-value="student.disabilities.join(',')"
                                               ng-model="student.disabilities"
                                               name="student.disabilities"
                                               placeholder="Disabilities"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="form-group mt5">
                                    <div class="col-sm-12">
                                        <input type="text" tagsinput="tagsinput"
                                               ng-value="student.medical_conditions.join(',')"
                                               ng-model="student.medical_conditions"
                                               name="student.medical_conditions"
                                               placeholder="Medical Conditions"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-horizontal">
                                

                                <h5 class="mt5"><strong>Contact Information</strong></h5>
                                <hr/>
                                <div class="form-group mt5">
                                    <div class="col-sm-6">
                                        <input type="text"
                                               ng-model="student.contact_phone"
                                               name="student.contact_phone"
                                               class="form-control"
                                               placeholder="Contact Phone"/>
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control"
                                               ng-model="student.contact_email"
                                               name="student.contact_email"
                                               placeholder="Contact Email"/>
                                    </div>
                                </div>

                                <div class="form-group mt5">
                                    <div class="col-sm-12">
                                    <textarea placeholder="Contact Address"
                                              ng-model="student.contact_address"
                                              name="student.contact_address" cols="30"
                                              rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <span class="pull-right">
                                <span ng-show="$isUploading">
                                <span class="fa fa-spin fa-spinner"></span> Uploading...
                            </span>
                            <input type="submit"
                                   value="Save"
                                   class="btn btn-success"
                                   ng-click="enrollStudent(student)"
                                   ng-disabled="student.isUploading" />
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   <!-- Templates -->
   <script type="text/ng-template" id="StudentQuickEnrollDialog">
      <div class="row" style="padding: 15px">
        <h3 class="mt0">Quickly Enroll a Student</h3>
        <form>
          <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text"
                           required=""
                           ng-model="quickStudent.last_name"
                           name="quickStudent.last_name"
                           class="form-control"
                           placeholder="Last Name"/>
                </div>

                <div class="col-sm-6">
                    <input type="text"
                           required=""
                           ng-model="quickStudent.first_name"
                           name="quickStudent.first_name"
                           class="form-control"
                           placeholder="First Name"/>
                </div>
            </div>
            <div class="form-group row mt5">
                <div class="col-sm-6">
                    <select class="form-control"
                            required=""
                            ng-model="quickStudent.sex"
                            name="quickStudent.sex">
                        <option value="">Sex</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <p class="input-group">
                        <input  ng-disabled="quickStudent.saving" type="text"
                                placeholder="Start Date" class="form-control"
                                datepicker-popup ng-model="quickStudent.birth_date"
                                is-open="quickStudent.birthDateOpened"/>
                        <span class="input-group-btn">
                           <button type="button"
                                   ng-click="openBirthDate($event,quickStudent)"
                                   class="btn btn-default">
                               <em class="fa fa-calendar"></em>
                           </button>
                        </span>
                    </p>
                </div>
            </div>
            <div class="form-group row mt5">
                <div class="col-sm-6">
                    <select class="form-control"
                            required=""
                            ng-model="quickStudent.school_category"
                            ng-options="category.id as category.display_name for category in schoolCategories"
                            name="quickStudent.school_category">
                        <option value="">Select School Category</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <select class="form-control"
                            required=""
                            ng-model="quickStudent.school_class"
                            ng-options="category.id as category.display_name for category in classes"
                            name="quickStudent.school_class">
                        <option value="">Select a Class</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mt5">
              <div class="col-sm-12">
                   <button type="button" 
                        ng-click="closeThisDialog('cancel')" 
                        class="btn btn-default mr">Cancel
                  </button>
                  <button type="button" 
                          ng-click="enrollStudent(quickStudent,closeThisDialog);"
                          class="btn btn-primary">Save
                  </button>
              </div>
            </div>
       
          </div>    
        </form>
      </div>
   </script>