<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180221_153437_create_product_table extends Migration
{
	protected static $_table = 'product';
	
	protected static $_references = [
		
		[
			'refTable'  => 'taxonomy',
			'refColumn' => 'id',
			'column'    => 'taxonomy_id',
		],
	
	];
	
	public function safeUp()
	{
		$table = static::$_table;
		
		$this->createTable( $table, [
			'id'      => $this->primaryKey(),
			'taxonomy_id' => $this->bigInteger( 20 )->notNull(),
			'name'    => $this->string( 256 )->notNull(),
			'price'   => $this->decimal( 10, 2 )->defaultValue( 0 ),
			'units'   => $this->string( 10 )->null(),
		] );
		
		$refTable = $refColumn = $column = null;
		
		foreach( self::$_references as $ref ) {
			
			extract( $ref );
			
			$this->createIndex(
				"idx-$table-$column",
				$table,
				$column
			);
			
			$this->addForeignKey(
				"fk-$table-$column",
				$table,
				$column,
				$refTable,
				$refColumn,
				'CASCADE'
			);
		}
		
	}
	
	public function safeDown()
	{
		$table = static::$_table;
		
		$column = null;
		
		foreach( self::$_references as $ref ) {
			
			extract( $ref );
			
			$this->dropForeignKey(
				"fk-$table-$column",
				$table
			);
			
			$this->dropIndex(
				"idx-$table-$column",
				$table
			);
			
		}
		
		$this->dropTable( $table );
	}
	
}
