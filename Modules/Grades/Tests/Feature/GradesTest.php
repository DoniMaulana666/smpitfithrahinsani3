<?php

use Modules\Grades\Models\Grade;

uses(Tests\TestCase::class);

test('can see grade list', function() {
    $this->authenticate();
   $this->get(route('app.grades.index'))->assertOk();
});

test('can see grade create page', function() {
    $this->authenticate();
   $this->get(route('app.grades.create'))->assertOk();
});

test('can create grade', function() {
    $this->authenticate();
   $this->post(route('app.grades.store', [
       'name' => 'Joe',
       'email' => 'joe@joe.com'
   ]))->assertRedirect(route('app.grades.index'));

   $this->assertDatabaseCount('grades', 1);
});

test('can see grade edit page', function() {
    $this->authenticate();
    $grade = Grade::factory()->create();
    $this->get(route('app.grades.edit', $grade->id))->assertOk();
});

test('can update grade', function() {
    $this->authenticate();
    $grade = Grade::factory()->create();
    $this->patch(route('app.grades.update', $grade->id), [
        'name' => 'Joe Smith',
       'email' => 'joe@joe.com'
    ])->assertRedirect(route('app.grades.index'));

    $this->assertDatabaseHas('grades', ['name' => 'Joe Smith']);
});

test('can delete grade', function() {
    $this->authenticate();
    $grade = Grade::factory()->create();
    $this->delete(route('app.grades.delete', $grade->id))->assertRedirect(route('app.grades.index'));

    $this->assertDatabaseCount('grades', 0);
});