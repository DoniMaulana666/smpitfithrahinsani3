<?php

use Modules\Attendances\Models\Attendance;

uses(Tests\TestCase::class);

test('can see attendance list', function() {
    $this->authenticate();
   $this->get(route('app.attendances.index'))->assertOk();
});

test('can see attendance create page', function() {
    $this->authenticate();
   $this->get(route('app.attendances.create'))->assertOk();
});

test('can create attendance', function() {
    $this->authenticate();
   $this->post(route('app.attendances.store', [
       'name' => 'Joe',
       'email' => 'joe@joe.com'
   ]))->assertRedirect(route('app.attendances.index'));

   $this->assertDatabaseCount('attendances', 1);
});

test('can see attendance edit page', function() {
    $this->authenticate();
    $attendance = Attendance::factory()->create();
    $this->get(route('app.attendances.edit', $attendance->id))->assertOk();
});

test('can update attendance', function() {
    $this->authenticate();
    $attendance = Attendance::factory()->create();
    $this->patch(route('app.attendances.update', $attendance->id), [
        'name' => 'Joe Smith',
       'email' => 'joe@joe.com'
    ])->assertRedirect(route('app.attendances.index'));

    $this->assertDatabaseHas('attendances', ['name' => 'Joe Smith']);
});

test('can delete attendance', function() {
    $this->authenticate();
    $attendance = Attendance::factory()->create();
    $this->delete(route('app.attendances.delete', $attendance->id))->assertRedirect(route('app.attendances.index'));

    $this->assertDatabaseCount('attendances', 0);
});