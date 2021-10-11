<?php

namespace Pirectus\QueryBuilder;

use Pirectus\QueryBuilder\AbstractQueryBuilder;

/**
 *  Building Query for Items
 *
 *
 *  @author Björn Hase, Tentakelfabrik
 *  @license http://opensource.org/licenses/MIT The MIT License
 *  @link https://gitea.tentakelfabrik.de/tentakelfabrik/pirectus
 *
 */

class ItemsQueryBuilder extends AbstractQueryBuilder
{
    /**
     *  set fields
     *
     *  @param  array  $fields
     *  @return \Pirectus\ItemsQueryBuilder
     *
     */
    public function fields(array $fields)
    {
        $this->query['parameters']['fields'] = $fields;
        return $this;
    }

    /**
     *  adding fields and merge
     *
     *  @param  array  $fields
     *  @return \Pirectus\ItemsQueryBuilder
     *
     */
    public function addFields(array $fields)
    {
        $this->fillParameter('fields');

        $this->query['parameters']['fields'] = array_merge($this->query['parameters']['fields'], $fields);
        return $this;
    }

    /**
     *  set filter
     *
     *
     *  @param  array  $filter
     *  @return \Pirectus\ItemsQueryBuilder
     *
     */
    public function filter(array $filter)
    {
        $this->query['parameters']['filter'] = $filter;
        return $this;
     }

     /**
      *  adding filter and merge
      *
      *
      *  @param  array  $filter
      *  @return \Pirectus\ItemsQueryBuilder
      *
      */
     public function addFilter(array $filter)
     {
         $this->fillParameter('filter');

         $this->query['parameters']['filter'] = array_merge_recursive($this->query['parameters']['filter'], $filter);
         return $this;
      }

     /**
      *  set limit
      *
      *  @param  int $value
      *  @return \Pirectus\ItemsQueryBuilder
      *
      */
     public function limit(int $value)
     {
         $this->query['parameters']['limit'] = $value;

         return $this;
     }

     /**
      *  add offset
      *
      *  @param int $value
      *  @return \Pirectus\ItemsQueryBuilder
      *
      */
     public function offset(int $value)
     {
         $this->query['parameters']['offset'] = $value;

         return $this;
     }

     /**
      *  set GroupBy
      *
      *  @param array $field
      *  @return \Pirectus\ItemsQueryBuilder
      *
      */
     public function groupBy(array $groupBy)
     {
         $this->query['parameters']['groupBy'] = $groupBy;
         return $this;
     }

     /**
      *  add offset
      *
      *  @param string $field
      *  @return \Pirectus\ItemsQueryBuilder
      *
      */
     public function addGroupBy(string $field)
     {
         $this->fillParameter('groupBy');
         $this->query['parameters']['groupBy'][] = $field;

         return $this;
     }

     /**
      *  set aggregate
      *
      *  count, countDistinct, sum, sumDistinct,
      *  avg, avgDistinct, min, max
      *
      *  @param string $aggregate
      *  @param string $field
      *  @return \Pirectus\ItemsQueryBuilder
      *
      */
     public function aggregate(string $aggregate, string $field)
     {
         $this->fillParameter('aggregate');
         $this->query['parameters']['aggregate'][$aggregate] = $field;

         return $this;
     }

     /**
      *  sort
      *
      *  [ <field-name>, -<field-name> ]
      *
      *  @param array $field
      *  @return \Pirectus\ItemsQueryBuilder
      *
      */
     public function sort(array $sort)
     {
         $this->query['parameters']['sort'] = $sort;

         return $this;
     }

     /**
      *  add sort and merge
      *
      *  [ <field-name>, -<field-name> ]
      *
      *  @param array $field
      *  @return \Pirectus\ItemsQueryBuilder
      *
      */
     public function addSort(array $sort)
     {
         $this->fillParameter('sort');
         $this->query['parameters']['sort'] = array_merge($this->query['parameters']['sort'], $sort);

         return $this;
     }

     /**
      *  search
      *
      *  @param string $value
      *  @return \Pirectus\ItemsQueryBuilder
      *
      */
     public function search(string $value)
     {
         $this->query['parameters']['search'] = $value;

         return $this;
     }

     /**
      *  meta
      *
      *  total_count, filter_count, *
      *
      *  @param string $value
      *  @return \Pirectus\ItemsQueryBuilder
      *
      */
     public function meta(string $value)
     {
         $this->query['parameters']['meta'] = $value;

         return $this;
     }

     /**
      *  set aliases
      *
      *
      *  @param string $value
      *  @return \Pirectus\ItemsQueryBuilder
      *
      */
     public function aliases(string $field, string $alias)
     {
         $this->query['parameters']['alias'][$alias] = $field;

         return $this;
     }

     /**
      *  if fields not set, add empty array
      *
      *  @param string $field
      *
      */
     private function fill(string $field)
     {
         if (!isset($this->query['parameters'][$field])) {
             $this->query['parameters'][$field] = [];
         }
     }
 }