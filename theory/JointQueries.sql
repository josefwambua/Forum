Joins are operations used to retrieve data from a tables that share a common column.
## When working with multiple tables at the same time, assuming them to be a single entity.
### Types
Examples:
1.Inner Join
2.Outer Join - Examples 
        Right outer join 
        Left outer join        
        Full outer Join  
3.Self Join


4.Cross Join



Join Conditions
i.Equi Join
ii. Non-Equi join 

Natural Join
Example
Department table||
Desc departments 
department_id, department_name, manager_id, location_id

Locations table
location_id Pk
street_address 
postal_code
city 
state_province 
country_id

Query for natural join
Finding city for all department
Select department_name, city From departments  Natural Join locations;
Above generates all cities from both department and locations table :
departments.location_id=locations.location_id

In a scenario where source table and target table has more than one common columns
Employees table
employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, commission_pct, manager_id, department_id, location
Departments table
department_id, department_name, manager_id, location_id

Using natural join
Getting employee name and department name which he/she is working
SELECT firstname, department_name FROM employees Natural Join departments

-- Natural join using onclause
SELECT firstname,department_name FROM employees JOIN departments ON 
(employees.manager_id =  departments.manager_id AND employees.department_id = department.department_id);

--NATURAL JOIN WITH USING CLAUSE
SELECT firstname, department_name FROM employees Natural Join departments

SELECT firstname, department_name FROM employees JOIN departments USING(manager_id);


________________________RIGHT OUTER JOIN________________________________________________________________
SYNTAX
SELECT columns...FROM 
Target_table RIGHT OUTER JOIN source_table
ON(expression);

CREATE TABLE emp(
    emp_id NUMBER(2) CONSTRAINT emp_col1_pk_PRIMARY KEY,
    emp_name VARCHAR(255),
    emp_salary NUMBER(5);
);

CREATE TABLE dept(
dept_id NUMBER(2) CONSTRAINT dept_col1_PRIMARY KEY,
dept_name VARCHAR(255),
emp_id CONSTRAINT dept_col3_fk REFERENCES emp(emp_id)

)

-- QUERY 1 RIGHT OUTER JOIIN WITH ON CLAUSE
SELECT emp_name, dept_name FROM RIGHT OUTER JOIN emp ON(emp.emp_id=dept.emp_id);

--- QUERY 2 RIGHT OUTER JOIN WITH USING CLAUSE
SELECT emp_name, dept_name FROM RIGHT OUTER JOIN emp USING(emp_id) WHERE(emp.emp_salary>50000);
