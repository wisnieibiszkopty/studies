set(BINARY ${CMAKE_PROJECT_NAME}_test)

file(GLOB_RECURSE TEST_SOURCES LIST_DIRECTORIES false *.h *.cpp)

add_executable(${BINARY}_run ${TEST_SOURCES}
        main.cpp)

add_test(NAME ${BINARY} COMMAND ${BINARY}_run)

target_link_libraries(${BINARY}_run PUBLIC ${CMAKE_PROJECT_NAME}_lib gtest)