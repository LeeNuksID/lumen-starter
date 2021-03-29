<?php
class EventTest extends TestCase{
    /**
     * /event [GET]
     */
    public function testShouldReturnAllEvent(){

        $this->get("v1/events", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'id',
                    'title',
                    'date',
                    'location',
                    'description',
                    'category',
                    'flags',
                ]
            ],
            'meta' => [
                '*' => [
                    'total',
                    'count',
                    'per_page',
                    'current_page',
                    'total_pages',
                    'links',
                ]
            ]
        ]);
        
    }

    /**
     * /event/id [GET]
     */
    public function testShouldReturnEvent(){
        $this->get("v1/event/1", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'id',
                    'title',
                    'date',
                    'location',
                    'description',
                    'category',
                    'flags',
                ]
            ]    
        );
        
    }

    /**
     * /event [POST]
     */
    public function testShouldCreateEvent(){

        $parameters = [
            'title'         => 'Kajian Harian DS',
            'date'          => '2021-03-15T20:59:00.316Z',
            'location'      => 'Darush Sholihin',
            'description'   => 'Kajian Harian di Darush Sholihin',
            'categoryId'    => 1,
            'flags'         => 'segera'
        ];

        $this->post("v1/event", $parameters, []);
        $this->seeStatusCode(201);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'title',
                    'date',
                    'location',
                    'description',
                    'category',
                    'flags'
                ]
            ]    
        );
        
    }
    
    /**
     * /event/id [PUT]
     */
    public function testShouldUpdateEvent(){

        $parameters = [
            'title'         => 'Kajian Harian DS',
            'date'          => '2021-03-15T20:59:00.316Z',
            'location'      => 'Darush Sholihin',
            'description'   => 'Kajian Harian di Darush Sholihin',
            'flags'         => 'segera'
        ];

        $this->put("v1/event/1", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'title',
                    'date',
                    'location',
                    'description',
                    'category',
                    'flags'
                ]
            ]    
        );
    }

    /**
     * /event/id [DELETE]
     */
    public function testShouldDeleteEvent(){
        
        $this->delete("v1/event/1", [], []);
        $this->seeStatusCode(200);
    }

}