<?php

namespace Tests\Feature;

use Tests\TestCase;

class TodoTest extends TestCase
{
    /*
     * List of Task Ids to delete
     * @var array
     */
    private $taskIds = [];

    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        foreach ($this->taskIds as $id) {
            $this->deleteTask($id);
        }

        parent::tearDown();
    }

    /**
     * Test Get Task API.
     *
     * @return void
     */
    public function testGetTask(): void
    {
        $task = $this->createTask();

        $response = $this->get('/api/todo/' . $task['id']);

        $response->assertJsonStructure([
            'data' => [
                'title',
                'description',
                'rank',
                'created_at',
                'updated_at',
                'id'
            ]
        ]);

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'title' => $task['title'],
            'description' => $task['description'],
            'rank' => $task['rank']
        ]);
    }

    /**
     * Test Find Task API.
     *
     * @return void
     */
    public function testFindTask(): void
    {
        $task = $this->createTask();

        $response = $this->call('GET', '/api/todo', ['title' => $task['title']]);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'title',
                    'description',
                    'rank',
                    'created_at',
                    'updated_at',
                    'id'
                ]
            ]
        ]);

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'title' => $task['title'],
            'description' => $task['description'],
            'rank' => $task['rank']
        ]);
    }

    /**
     * Test Add Task API.
     *
     * @return void
     */
    public function testAddTask(): void
    {
        $rank = rand(100, 1000);

        $response = $this->postJson('/api/todo', [
            'title' => 'Test01 Title',
            'description' => 'Test01 Description',
            'rank' => $rank
        ]);

        $this->taskIds[] = $response->json('data')['id'];

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                'title',
                'description',
                'rank',
                'created_at',
                'updated_at',
                'id'
            ]
        ]);

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'title' => 'Test01 Title',
            'description' => 'Test01 Description',
            'rank' => $rank
        ]);
    }

    /**
     * Test Delete Task API.
     *
     * @return void
     */
    public function testDeleteTask(): void
    {
        $task = $this->createTask();

        $response = $this->delete('/api/todo/' . $task['id']);

        $response->assertStatus(204);
    }

    /**
     * Test Reorder Task API.
     *
     * @return void
     */
    public function testReorderTasks(): void
    {
        $firstTask = $this->createTask();
        $secondTask = $this->createTask();

        $response = $this->postJson('/api/todo/reorder', [
            [
                'id' => $firstTask['id'],
                'rank' => $secondTask['rank']
            ], [
                'id' => $secondTask['id'],
                'rank' => $firstTask['rank']
            ]
        ]);

        $response->assertStatus(200);

        if ($response->json('data')['0']['id'] === $firstTask['id']) {
            $firstTaskResponse = $response->json('data')['0'];
            $secondTaskResponse = $response->json('data')['1'];
        } else {
            $firstTaskResponse = $response->json('data')['1'];
            $secondTaskResponse = $response->json('data')['0'];
        }

        $this->assertEquals($firstTask['rank'], $secondTaskResponse['rank']);
        $this->assertEquals($secondTask['rank'], $firstTaskResponse['rank']);
    }

    private function createTask()
    {
        $rank = rand(100, 1000);

        $response = $this->postJson('/api/todo', [
            'title' => 'Test01 Title',
            'description' => 'description',
            'rank' => $rank
        ])->json('data');

        $this->taskIds[] = $response['id'];

        return $response;
    }

    private function deleteTask(int $id)
    {
        $this->delete('/api/todo/' . $id);
    }
}
