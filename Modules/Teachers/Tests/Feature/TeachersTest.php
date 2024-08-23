<?php

use Modules\Teachers\Models\Teacher;

uses(Tests\TestCase::class);

test('can see teacher list', function() {
    $this->authenticate();
   $this->get(route('app.teachers.index'))->assertOk();
});

test('can see teacher create page', function() {
    $this->authenticate();
   $this->get(route('app.teachers.create'))->assertOk();
});

test('can create teacher', function() {
    $this->authenticate();
   $this->post(route('app.teachers.store', [
       'name' => 'Joe',
       'email' => 'joe@joe.com'
   ]))->assertRedirect(route('app.teachers.index'));

   $this->assertDatabaseCount('teachers', 1);
});

test('can see teacher edit page', function() {
    $this->authenticate();
    $teacher = Teacher::factory()->create();
    $this->get(route('app.teachers.edit', $teacher->id))->assertOk();
});

test('can update teacher', function() {
    $this->authenticate();
    $teacher = Teacher::factory()->create();
    $this->patch(route('app.teachers.update', $teacher->id), [
        'name' => 'Joe Smith',
       'email' => 'joe@joe.com'
    ])->assertRedirect(route('app.teachers.index'));

    $this->assertDatabaseHas('teachers', ['name' => 'Joe Smith']);
});

test('can delete teacher', function() {
    $this->authenticate();
    $teacher = Teacher::factory()->create();
    $this->delete(route('app.teachers.delete', $teacher->id))->assertRedirect(route('app.teachers.index'));

    $this->assertDatabaseCount('teachers', 0);
});