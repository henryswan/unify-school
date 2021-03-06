<?php
/**
 * Created by PhpStorm.
 * User: Ak
 * Date: 4/1/2015
 * Time: 8:31 AM
 */

namespace UnifySchool\Http\Controllers\School\Resources\Configurations;


use Illuminate\Support\Str;
use Input;
use UnifySchool\Entities\School\ScopedSchoolCategoryArm;
use UnifySchool\Entities\School\ScopedSchoolCategoryArmSubdivision;
use UnifySchool\Http\Controllers\Controller;
use UnifySchool\Http\Requests\CategoriesAndClassesRequest;
use UnifySchool\Repositories\School\ScopedSchoolCategoriesRepository;

class CategoryAndClassesSettingsController extends Controller
{

    public static $action_school_category = 'school_category';
    public static $action_school_category_arms = 'school_category_arms';
    public static $action_school_category_arm_subarms = 'school_category_arm_subarms';
    public static $action_remove_all_school_category_arm_subarms = 'remove_all_school_category_arm_subarms';

    public function index()
    {

    }

    public function show($id)
    {

    }

    public function store(CategoriesAndClassesRequest $request, ScopedSchoolCategoriesRepository $schoolCategoriesRepository)
    {
        $action = $request->get('action', 'default');

        switch ($action) {
            case static::$action_school_category:
                return $this->createNewSchoolCategory($request, $schoolCategoriesRepository);
            case static::$action_school_category_arms:
                return $this->createNewSchoolCategoryArm($request, $schoolCategoriesRepository);
            case static::$action_school_category_arm_subarms:
                return $this->createNewSchoolCategoryArmSubDivision($request, $schoolCategoriesRepository);
        }
    }

    public function update($id, CategoriesAndClassesRequest $request, ScopedSchoolCategoriesRepository $schoolCategoriesRepository)
    {
        $action = Input::get('action', 'default');

        switch ($action) {
            case static::$action_school_category:

                return \Response::json(['success' => true]);
            case static::$action_school_category_arms:
                $response = $this->updateSchoolArm($id, $request);
                return \Response::json(['success' => true]);
            case static::$action_school_category_arm_subarms:
                $response = $this->updateSchoolSubArmDivision($id, $request);
                return \Response::json(['success' => true,'data' => $response]);

            case static::$action_remove_all_school_category_arm_subarms:

                return \Response::json(['success' => true]);
        }
    }

    public function destroy($id, ScopedSchoolCategoriesRepository $schoolCategoriesRepository)
    {
        $action = Input::get('action', 'default');

        switch ($action) {
            case static::$action_school_category:
                $schoolCategoriesRepository->delete($id);
                return \Response::json(['success' => true]);
            case static::$action_school_category_arms:
                ScopedSchoolCategoryArm::destroy($id);
                return \Response::json(['success' => true]);
            case static::$action_school_category_arm_subarms:
                ScopedSchoolCategoryArmSubdivision::destroy($id);
                return \Response::json(['success' => true]);
            case static::$action_remove_all_school_category_arm_subarms:
                ScopedSchoolCategoryArm::find($id)->restoreDefaultSubDivision();
                return \Response::json(['success' => true]);
        }
    }

    private function createNewSchoolCategory(CategoriesAndClassesRequest $request, ScopedSchoolCategoriesRepository $schoolCategoriesRepository)
    {
        $data = [
            'scoped_school_type_id' => $request->get('school_type_id'),
            'school_id' => $this->getSchool()->id,
            'display_name' => $request->get('name'),
            'name' => Str::slug($request->get('name'))
        ];

        $model = $schoolCategoriesRepository->create($data);
        $model->load(['school_category_arms', 'school_category_arms.school_category_arm_subdivisions']);
        return \Response::json(['success' => true, 'model' => $model]);
    }

    private function createNewSchoolCategoryArmSubDivision(CategoriesAndClassesRequest $request, ScopedSchoolCategoriesRepository $schoolCategoriesRepository)
    {
        $arm = $request->get('school_category_arm');

        $category_Arm = ScopedSchoolCategoryArm::find($arm['id']);

        if (is_null($category_Arm))
            abort(404, 'Invalid Category arm id');

        $bulk = [];

        if (count($arm['school_category_arm_subdivisions']) > 1) {
            foreach ($arm['school_category_arm_subdivisions'] as $subdivision) {
                $data = [
                    'school_id' => $this->getSchool()->id,
                    'name' => Str::slug($subdivision['name'])
                ];

                $temp = ScopedSchoolCategoryArmSubdivision::firstOrNew($data);
                $temp->display_name = $subdivision['display_name'];
                $bulk[] = $temp;
            }
            $category_Arm->deleteDefaultSubdivision();

            $category_Arm->school_category_arm_subdivisions()->saveMany($bulk);

            return \Response::json(['success' => true, 'model' => $category_Arm->school_category_arm_subdivisions]);
        } else {
            return \Response::json(['success' => true, 'model' => $category_Arm->school_category_arm_subdivisions]);
        }
    }

    private function createNewSchoolCategoryArm(CategoriesAndClassesRequest $request, ScopedSchoolCategoriesRepository $schoolCategoriesRepository)
    {
        $data = [
            'scoped_school_category_id' => $request->get('school_category_id'),
            'school_id' => $this->getSchool()->id,
            'display_name' => $request->get('name'),
            'name' => Str::slug($request->get('name'))
        ];

        $model = ScopedSchoolCategoryArm::create($data);
        $model->load(['school_category_arm_subdivisions']);
        return \Response::json(['success' => true, 'model' => $model]);
    }

    /**
     * @param $id
     * @param CategoriesAndClassesRequest $request
     */
    public function updateSchoolSubArmDivision($id, CategoriesAndClassesRequest $request)
    {
        $subarm = ScopedSchoolCategoryArmSubdivision::findOrFail($id);
        $display_name = $request->get('display_name', $subarm->display_name);
        $subarm->display_name = $display_name;
        $subarm->save();

        return $subarm;
    }

    private function updateSchoolArm($id, $request)
    {
        $subarm = ScopedSchoolCategoryArm::findOrFail($id);
        $display_name = $request->get('display_name', $subarm->display_name);
        $subarm->display_name = $display_name;
        $subarm->save();

        return $subarm;
    }
}